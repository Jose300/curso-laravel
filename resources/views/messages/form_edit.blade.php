
{!! method_field('PUT') !!}
{!! csrf_field() !!}

    <legend class="text-center header">Editar Mensaje</legend>
    @if( session()->has('info') )
    <h3>{{ session('info') }}</h3>
    @endif

    <div class="container-fluid" id="container">
       <div class="row row-cols-1">
        <div class="col-xs-12">
            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                <div class="col-md-6">
                    <input id="input_crear" name="nombre" type="text" value="{{ $mensaje_edit->nombre }}" placeholder="Nombre" class="form-control" readonly>
                    {!! $errors->first('nombre' , '<span class=error>:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                <div class="col-md-6">
                    <input id="input_crear" name="email" type="email" value="{{ $mensaje_edit->email }}" placeholder="Correo Electronico" class="form-control" readonly>
                    {!! $errors->first('email', '<span class=error>:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                <div class="col-md-6">
                    <input id="input_crear" name="phone" type="text" value="{{ $mensaje_edit->phone }}" placeholder="Telefono" class="form-control" readonly>
                    {!! $errors->first('telefono', '<span class=error>:message</span>') !!}
                </div>
            </div>

            <div class="form-group">
                <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                <div class="col-md-6">
                    <textarea id="input_crear" class="form-control" id="mensaje" name="mensaje" placeholder="Ingrese aqui su mensaje" rows="7">{{ $mensaje_edit->mensaje }}</textarea>
                    {!! $errors->first('mensaje', '<span class=error>:message</span>') !!}
                </div>
            </div>
      
    