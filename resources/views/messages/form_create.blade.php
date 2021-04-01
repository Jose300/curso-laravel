{!! csrf_field() !!}

<legend class="text-center header">Crear Nuevo Mensaje</legend>
@if( session()->has('info') )
<h3>{{ session('info') }}</h3>
@endif

<div class="container-fluid" id="container">
 <div class="row row-cols-1">
    <div class="col-xs-12">
        @if($showFields)
        <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
            <div class="col-md-6">
                <input id="input_crear" name="nombre" type="text" value="{{ old('nombre') }}" placeholder="Nombre" class="form-control" required>
                {!! $errors->first('nombre' , '<span class=error>:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
            <div class="col-md-6">
                <input id="input_crear" name="email" type="email" value="{{ old('email') }}" placeholder="Correo Electronico" class="form-control" required>
                {!! $errors->first('email', '<span class=error>:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
            <div class="col-md-6">
                <input id="input_crear" name="phone" type="text" value="{{ old('phone') }}" placeholder="Telefono" class="form-control" required>
                {!! $errors->first('telefono', '<span class=error>:message</span>') !!}
            </div>
        </div>
        @endif
        <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <div class="col-md-6">
                <textarea id="input_crear" class="form-control" id="mensaje" name="mensaje" placeholder="Ingrese aqui su mensaje" rows="7">{{ old('mensaje') }}</textarea>
                {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
            </div>
        </div>