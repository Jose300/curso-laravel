@extends('layout')

@section('contenido')

<div class="container-fluid">

	<h1 class="display-5">Saludo para un Usuario  "{{ $nombre }}"</h1>
	<br>

	<ul class="list-group" id="lista">

		@foreach($consolas as $consola)
		<li class="list-group-item active">{{ $consola }}</li>
		@endforeach

	</ul>

	@forelse($consolas_empty as $consola_vacia)
	<li class="list-group-item active">{{ $consola_vacia }}</li>
	@empty
	<small><p><mark>'EN CONSOLAS EMPTY NO HAY CONSOLAS DISPONIBLES' </p></small></mark>
	@endforelse

	@if(count($consolas) === 1)
	<small><p><mark> 'HAY UNA SOLA CONSOLA' </p></small></mark>
	@elseif(count($consolas) > 1)
	<small><p><mark> 'TIENES VARIAS CONSOLAS DISPONIBLES' </p></small></mark>
	@else
	<small><p><mark> 'NO TIENES NINGUNA CONSOLA' </p></small></mark>
	@endif

</div>
@stop