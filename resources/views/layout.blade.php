<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
 <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
 <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
	
  <?php 
  function activeMenu($url){
    return request()->is($url) ? 'active' : '';
  }

  ?>
  <div class="container-fluid">

    <header class="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="menu">

        <ul class="navbar-nav">
          <li class="nav-item " >
            <a class="nav-link" id="logo">CURSO-LARAVEL</a>
          </li>
          <li class="{{ activeMenu('/') }}">
            <a href="{{ route('home') }}" class="nav-link " id="home">Home</a>
          </li>
          <li class="{{ activeMenu('messages.create') }}">
            <a href="{{ route('mensajes.create') }}" class="nav-link">Crear Mensajes</a>
          </li>
          <li class="{{ activeMenu('saludos') }}">
            <a href="{{ route('saludos') }}" class="nav-link">Saludos</a>
          </li>

          @if(auth()->guest())
          <li class="{{ activeMenu('login') }}">
            <a href="{{ route('login') }}" class="nav-link" id="login">Login</a>
          </li>

          @else
          @if(auth()->user()->hasRoles(['Admin']))

          <li class="{{ activeMenu('messages.index') }}">
            <a href="{{ route('mensajes.index') }}" class="nav-link">Mensajes</a>
          </li>
          <li class="{{ activeMenu('usuarios.index') }}">
            <a href="{{ route('usuarios.index') }}" class="nav-link">Usuarios</a>
          </li>
          @endif
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle col-12" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="navbarDropdown">
             
              <a class="dropdown-item" href="usuarios/{{ auth()->id() }}/edit">Mi cuenta</a>
              <a class="dropdown-item" href="logout">Cerrar Sesion</a>
            </li>
          </div>

          @endif

          
        </ul>

      </nav>
    </header>
    <br><br>

    @yield('contenido')

    <!-- jQuery -->
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
  </body>

  <!-- Footer -->
  <footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">Copyright ®{{ date('Y') }}
      <a href="https://mdbootstrap.com/"> aprendible.com</a>
    </div>
    <!-- Copyright -->
    </html>




