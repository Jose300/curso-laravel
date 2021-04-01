@extends('layout')

@section('contenido')

<h1>Usuarios</h1>

<div class="container-fluid">
<a class="btn btn-primary float-right" href="{{ route('usuarios.create') }}">Crear Nuevo Usuario</a>
<br><br><br>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>CORREO</th>
			<th>ROLE</th>
			<th>NOTAS DEL USUARIO</th>
			<th>ETIQUETAS</th>
			<th>ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>
				<!--Utilizacion de Collection en vez de Foreach-->
				{{ $user->roles->pluck('display_name')->implode(', ') }}
				
			</td>
			<td>{{ $user->note ? $user->note['body'] : '' }}</td>
			<td>{{ $user->tags->pluck('name')->implode(',') }}</td>
			<td>
				<a class="btn btn-info btn-sm" href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
			<form style="display:inline" method="POST" action="{{ route('usuarios.destroy', $user->id) }}">
				{!! csrf_field() !!}
				{!! method_field('DELETE') !!}
				<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
			</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>


@stop