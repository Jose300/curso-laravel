@extends('layout')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

                <form class="form-horizontal" method="POST" action="{{ route('usuarios.store') }}">

                    @include('users.form_create', ['user_edit' => new App\Models\User])
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
