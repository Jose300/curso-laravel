@extends('layout')

@section('contenido')

<h1>Mensajes</h1>

<p><h3>Enviado por: </h3>{{ $mensaje_id->nombre }} - {{ $mensaje_id->email }} - {{ $mensaje_id->phone }} </p>
<p><h3>Su Mensaje: </h3>{{ $mensaje_id->mensaje }}</p>

@stop