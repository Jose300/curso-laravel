@extends('layout')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

                @if( session()->has('info') )
                <div class="alert alert-success" role="alert"> {{ session('info') }}</div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('mensajes.update', $mensaje_edit->id) }}">

                    @include('messages.form_edit', [
                        'btnText' => 'Actualizar',
                        'showFields' => ! $mensaje_edit->user_id
                        ])
                    
                    <div class="text-center">
                        <input class="btn btn-primary btn-lg" type="submit" value="Guardar"></input>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</form> 
@stop