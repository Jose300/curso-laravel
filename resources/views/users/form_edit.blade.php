
{!! method_field('PUT') !!}
{!! csrf_field() !!}
<legend class="text-center header">Crear Usuarios</legend>
@if( session()->has('info') )
<div class="alert alert-success" role="alert"> {{ session('info') }}</div>
@endif

<div class="container-fluid" id="container">
 <div class="row row-cols-1">
    <div class="col-xs-12">
        <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
            <div class="col-md-6">
                <input id="input_crear" name="name" type="text" value="{{ $user_edit->name }}" placeholder="Nombre" class="form-control">
                {!! $errors->first('name' , '<span class=error>:message</span>') !!}
            </div>
        </div>
        <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
            <div class="col-md-6">
                <input id="input_crear" name="email" type="email" value="{{ $user_edit->email }}" placeholder="Correo Electronico" class="form-control">
                {!! $errors->first('email', '<span class=error>:message</span>') !!}
            </div>
        </div>
        
        @unless ($user_edit->id)
        <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
            <div class="col-md-6">
                <input id="input_crear" name="password" type="password" placeholder="Contraseña" class="form-control">
                {!! $errors->first('password' , '<span class=error>:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
            <div class="col-md-6">
                <input id="input_crear" name="password_confirmation" type="password" placeholder="Confirmar Contraseña" class="form-control">
                {!! $errors->first('password_confirmation' , '<span class=error>:message</span>') !!}
            </div>
        </div>
        @endunless

        <br>
        <div class="custom-checkbox">
            @foreach($roles as $id => $name)
            <label>
                <input id="check_editar" type="checkbox" name="roles[]" value="{{ $id }}" {{ $user_edit->roles->pluck('id')->contains($id) ? 'checked' : '' }}>
                {!! $errors->first('roles' , '<span class=error>:message</span>') !!}
                {{ $name }}
            </label>
            @endforeach
        </div>                         
        <br>