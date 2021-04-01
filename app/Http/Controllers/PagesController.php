<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{

    public function __construct(){

        //Ejemplo con solo uno
        //$this->middleware('App\Http\Middleware\ExampleMiddleware', ['only' => ['home']]);

        //Ejemplo con solo la excepcion
        //$this->middleware('App\Http\Middleware\ExampleMiddleware', ['except' => ['home']]);
    }
    
    public function home(){
    	return view('home');
    }

    public function contactos(){
    	return view('contactos');
    }


    public function saludo($nombre = "INVITADO"){
    	$html = "<h2>Codigo HTML</h2>";
		//$script = "<script>alert('Prueba de Alerta en Laravel')</script>";

		$consolas = [
		"Play Station 5",
		"Nintendo Retro",
		"Xbox One",
		"Wii U"
		];

		$consolas_empty = [
		];
		
		return view('saludos', compact('nombre','html','consolas','consolas_empty'));
    }

    public function mensajes(CreateMessageRequest $request){

        $data = $request->all();// procesar los datos del formulario

        //redireccion

        /* Primer Ejemplo
        return redirect()
        ->route('contactos')
        ->with('info', 'Tu mensaje fue enviado Exitosamente');*/

        return back()->with('info', 'Tu mensaje fue enviado Exitosamente');
    }


}
