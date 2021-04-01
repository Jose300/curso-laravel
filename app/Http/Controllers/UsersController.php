<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Policies\UserPolicy;
use App\Http\Middleware;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show' ] ]);
        $this->middleware('roles:Admin', ['except' => ['edit', 'index' , 'update', 'show', 'create','store','destroy' ] ]);
    }

    public function index()
    {
        $users = User::with(['roles','note','tags'])->get();
        return view('users.index',compact('users'));

    }

   
    public function create()
    {
        $roles = Role::pluck('display_name','id');

        return view('users.create',compact('roles'));
    }

    
    public function store(CreateUserRequest $request)
    {
        $user = User::create($request->all());
        
        $user->roles()->attach($request->roles); 

        return redirect()->route('usuarios.index');
    }

    
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show',compact('user'));
    }

    
    public function edit($id)
    {

        $user_edit = User::findOrFail($id);

        $this->authorize('edit',$user_edit);

        $roles = Role::pluck('display_name','id');

        return view('users.edit',compact('user_edit' , 'roles'));
    }

    
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $this->authorize('update',$user); 

        $user->update($request->only('name','email'));

        $user->roles()->sync($request->roles);

        return back()->with('info','Usuario Actualizado');
    }

   
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back();

    }
}
