<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title> @yield('title') </title>

<link rel="stylesheet" href="{{ asset('boostrap/dist/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('boostrap/dist/css/homestyle.css') }}"/>

@yield('css')


<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('boostrap/dist/js/bootstrap.min.js') }}"></script>


@yield('scripts')






</head>
<body>

	 @if (Auth::check())
	    @include('layouts.nav')
     @endif
  <div class="container">
    @yield('content')

  </div>
</body>
</html>