<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  href="{{ URL::route('home') }}" class="navbar-brand">AMEX</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                {{--<li><a href="#">Inicio</a></li>
                <li class="active"><a href="http://bootsnipp.com/snippets/featured/nav-account-manager" target="_blank">Inspirado en este ejemplo</a></li>--}}
                 @if(Auth::user()->id_rol == 1)
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalogos
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('prueba') }}">Lista Usuarios</a></li>
                        <li><a href="{{ URL::route('lista-product') }}">Lista Productos</a></li>
                        <li><a href="{{ URL::route('config') }}">Configuración</a></li>
                    </ul>
                 </li>
                 @endif

                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">prueba
                       <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                       <li>
                       <a href="{{ URL::route('insurace'); }}">Seguros</a>
                       </li>
                    </ul>
                 </li>

             </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong>{{ Auth::user()->name}}</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span style='-moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%;' >
                                            	<img class="profile-img"
											src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>{{ Auth::user()->name ." ". Auth::user()->first_name }} </strong></p>
                                        <p class="text-left small">{{Auth::user()->email }}</p>
                                        <p class="text-left">
                                            <a href="{{ URL::to('profile',Auth::user()->id) }}" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="{{ URL::to('logout') }}" class="btn btn-danger btn-block">Cerrar Sesion</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>