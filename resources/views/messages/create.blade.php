@extends('layout')

@section('contenido')

<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">

                <form class="form-horizontal" method="POST" action="{{ route('mensajes.store') }}">

                    @include('messages.form_create', [
                        'messages_edit' => new App\Models\MessageModel,
                        'showFields' => auth()->guest()
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