<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Models\MessageModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\CreateMessageRequest;
use App\Events\MessageWasReceived;

class MessagesController extends Controller
{

    function __construct(){

        $this->middleware('auth',['except' => ['create','store']]);
    }
    
    public function index()
    {

        //$mensajes = DB::table('messages')->get();

        //Query con Eloquent
        $mensajes = MessageModel::with(['user','note','tags'])->get();

        return view('messages.index',compact('mensajes'));
        
    }

   
    public function create()
    {
        return view('messages.create');
    }

    
    public function store(Request $request)
    {
        //Guardar Mensaje
        /*DB::table('messages')->insert([
            "nombre" => $request->nombre,
            "email" => $request->email,
            "phone" => $request->telefono,
            "mensaje" => $request->mensaje,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);*/

        //Utilizando Eloquent
        //No es necesario utilizar created_at y updated_at con la clase Carbon ya que Eloquent llena automaticamente la fecha enm la base de datos
        /*$message = new MessageModel;
        $message->nombre = $request->nombre;
        $message->email = $request->email;
        $message->phone = $request->telefono;
        $message->mensaje = $request->mensaje;
        $message->save();*/
        //dd($request->all());


        //Segunda forma de almacenado con Eloquent utilizando almacenado masivo de Datos
        $message = MessageModel::create($request->all());

        event(new MessageWasReceived($message));

        /*Mail::send('email.contact',['msg' => $message],function($m) use ($message){

            $m->to($message->email, $message->nombre)->subject('Tu Mensaje fue Recibido');
        });*/

        //Redireccionar
        return redirect()->route('mensajes.create')->with('info','Hemos Recibido tu mensaje');        
    }

    
    public function show($id)
    {
        //Mostrar mensajes con la clase DB
        //$mensaje_id = DB::table('messages')->where('id', $id)->first();

        //Mostrar mensajes con el metodo Eloquent u ORM
        $mensaje_id = MessageModel::findOrFail($id);

        return view('messages.show',compact('mensaje_id'));
    }

    
    public function edit($id)
    {
        //Editar mensajes con la clase DB
        //$mensaje_edit = DB::table('messages')->where('id', $id)->first();

        //Editar mensajes con el metodo Eloquent u ORM
        $mensaje_edit = MessageModel::findOrFail($id);

        return view('messages.edit',compact('mensaje_edit'));
    }

    
    public function update(Request $request, $id)
    {
        //Actualizar mensajes con la clase DB
        /*DB::table('messages')->where('id', $id)->update([
            "nombre" => $request->nombre,
            "email" => $request->email,
            "phone" => $request->telefono,
            "mensaje" => $request->mensaje,
            "updated_at" => Carbon::now(),
        ]);*/

        //Actualizar mensajes con el metodo Eloquent u ORM
        MessageModel::findOrFail($id)->update($request->all());

        return redirect()->route('mensajes.index');
    }

    
    public function destroy($id)
    {
        //Eliminar mensajes con la clase DB
        /*DB::table('messages')->where('id', $id)->delete();*/

        //Eliminar mensajes con el metodo Eloquent u ORM
        MessageModel::findOrFail($id)->delete();
        return redirect()->route('mensajes.index');
    }
}
