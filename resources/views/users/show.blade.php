@extends('layout')

@section('contenido')

<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

                <h1>{{ $user->name }}</h1>
                <table class="table"> 
                    <tr>
                        <th>Nombre</th>
                        <td>{{ $user->name }} </td>
                    </tr>
                    <br>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }} </td>
                    </tr>
                    <br>
                    <tr>
                        <th>Roles:</th>
                        <td>
                            @foreach($user->roles as $role)
                            {{ $role->display_name}}
                            @endforeach
                        </td>
                    </tr>
                </table>
                @can('edit', $user)
                <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-info">Editar</a>
                @endcan
            </div>
        </div>
    </div>
    @stop