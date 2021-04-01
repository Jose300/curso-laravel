@extends('layout')

@section('contenido')

<h1>Todos Los Mensajes</h1>

<div class="container-fluid">
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>NOMBRE</th>
			<th>CORREO</th>
			<th>TELEFONO</th>
			<th>MENSAJE</th>
			<th>NOTAS</th>
			<th>ETIQUETAS</th>
			<th>ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($mensajes as $mensaje)
		<tr>
			<td>{{ $mensaje->id }}
			<td>
				<a href="{{ route('mensajes.show', $mensaje->id) }}">
				{{ $mensaje->nombre }}</a>
			<td>{{ $mensaje->email }}
			<td>{{ $mensaje->phone }}
			<td>{{ $mensaje->mensaje }}
			<td>{{ $mensaje->note ? $mensaje->note->body : ''}}</td>
			<td>{{ $mensaje->tags->pluck('name')->implode(',') }}</td>		
			<td><a class="btn btn-info btn-sm" href="{{ route('mensajes.edit', $mensaje->id) }}">
			Editar</a>
			<form style="display:inline" method="POST" action="{{ route('mensajes.destroy', $mensaje->id) }}">
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