@extends('layout')

@section('contenido')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well well-sm">
				<div class="container-fluid" id="container">
					<div class="row row-cols-1">
						<div class="col-xs-10">
							<div class="form-group">
								<form class="form-group" method="POST" action="{{ route('login') }}">
									{!! csrf_field() !!}
									<legend class="text-center header">Login</legend>
									<input class="form-control" id="form_login" type="email" name="email" placeholder="email">
									<input class="form-control" id="form_login" type="password" name="password" placeholder="contraseña">
									<input class="btn btn-primary" id="boton_login" type="submit" value="Entrar">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</br>
@endsection