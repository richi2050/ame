<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title> @yield('title') </title>

<link rel="stylesheet" href="{{ asset('boostrap/dist/css/bootstrap.min.css') }}"/>
<style>


body {
background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);}
.error-template {
    padding: 40px 15px;
    text-align: center;}
.error-actions {
    margin-top:15px;
    margin-bottom:15px;}
.error-actions .btn {
    margin-right:10px; }
</style>

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
      <div class="row">
          <div class="col-md-12">
              <div class="error-template">
                  <h1>
                      Oops!</h1>
                  <div class="error-details">
                      <h3>
                        Lo sentimos, ha ocurrido un error, la página solicitada no se ha encontrado!
                      </h3>

                  </div>
                  <h2>
                      404 Not Found</h2>
                  <div class="error-actions">
                      <a href="{{URL::route('home')}}" class="btn btn-primary btn-lg">
                        <span class="glyphicon glyphicon-home"> Home</span>
                      </a>

                  </div>
              </div>
          </div>
      </div>
  </div>

</body>
</html>