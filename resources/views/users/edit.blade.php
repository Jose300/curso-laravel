@extends('layout')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

                @if( session()->has('info') )
                <div class="alert alert-success" role="alert"> {{ session('info') }}</div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('usuarios.update','$user_edit->id') }}">

                    @include('users.form_edit')
                    
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
