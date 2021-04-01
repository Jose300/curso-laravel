<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*DB::listen(function($query){
	echo "<prev>{{ $query->sql }} </prev>";
});*/


Route::get('/', ['as' => 'home' , 'uses' => 'App\Http\Controllers\PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'App\Http\Controllers\PagesController@saludo']);

//Rutas con Eloquent

Route::resource('mensajes','App\Http\Controllers\MessagesController');

Route::resource('usuarios','App\Http\Controllers\UsersController');
/*
Route::get('test', function(){

	$user = new App\Models\User;

	$user->name = 'Administrador';

	$user->email = 'admin@email.com';

	$user->password = Bcrypt('123456');

	$user->save();

	return $user;

});


Route::get('test', function(){

	$user = new App\Models\User;

	$user->name = 'Estudiante';

	$user->email = 'estudiante@email.com';

	$user->password = Bcrypt('123456');

	$user->save();

	return $user;

});


Route::get('test', function(){

	$user = new App\Models\User;

	$user->name = 'Invitado';

	$user->email = 'guest@email.com';

	$user->password = Bcrypt('123456');

	$user->save();

	return $user;

});

Route::get('crear_rol', function(){

	$role = new App\Models\Role;

	$role->name = 'Admin';

	$role->display_name = 'Administrador';

	$role->description = 'Este rol tiene los permisos de Administrador del site';

	$role->save();

	return $role;

});


Route::get('crear_rol', function(){

	$role = new App\Models\Role;

	$role->name = 'Estudiante';

	$role->display_name = 'Estudiante';

	$role->description = 'Este rol tiene los permisos de Estudiante del site';

	$role->save();

	return $role;

});*/


Route::get('crear_rol', function(){

	$role = new App\Models\Role;

	$role->name = 'Invitado';

	$role->display_name = 'Invitado';

	$role->description = 'Este rol tiene los permisos de Invitado del site';

	$role->save();

	return $role;

});

//Autenticacion de usuario
Route::get('login','App\Http\Controllers\Auth\LoginController@showLoginForm');

Route::post('login','App\Http\Controllers\Auth\LoginController@login');

Route::get('logout','App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();


//Route::get('contactanos', ['as' => 'contactos' , 'uses' => 'App\Http\Controllers\PagesController@contactos']);

//Route::post('contactos', 'App\Http\Controllers\PagesController@mensajes');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CRUD CON METODO REST
/*Route::get('messages', 'App\Http\Controllers\MessagesController@index')->name('messages.index');

Route::get('messages/create', 'App\Http\Controllers\MessagesController@create')->name('messages.create');

Route::post('messages', 'App\Http\Controllers\MessagesController@store')->name('messages.store');

Route::get('messages/{id}', 'App\Http\Controllers\MessagesController@show')->name('messages.show');

Route::get('messages/{id}/edit', 'App\Http\Controllers\MessagesController@edit')->name('messages.edit');

Route::put('messages/{id}', 'App\Http\Controllers\MessagesController@update')->name('messages.update');

Route::delete('messages/{id}', 'App\Http\Controllers\MessagesController@destroy')->name('messages.destroy');*/