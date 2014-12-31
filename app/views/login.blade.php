@extends('layouts.default')



@section('content')
<div class="container" style="margin-top:40px">
 @include('flash::message')
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Inicia sesión para continuar</strong>
					</div>
					<div class="panel-body">
						{{ Form::open(array('route' => 'login','id' => 'loginForm', 'name'=> 'loginForm','autocomplete'=>'off')) }}
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img"
											src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												{{ Form::text('username', Input::old('username'),array('autofocus','class'=>'form-control','placeholder' => 'Usuario')) }}
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												{{ Form::password('password',array('class'=>'form-control','placeholder'=>'Contraseña')) }}
											</div>
										</div> 
										<label>
											  {{ Form::checkbox('remember-me', true); }} Recordarme <br> </label>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Iniciar sesión">
										</div>
									</div>
								</div>
							</fieldset>
						{{ Form::close() }}
					</div>
					<div class="panel-footer ">
						No tienes una cuenta !! <a href="#" onClick=""> Regístrate aquí </a>
					</div>
                </div>
			</div>
		</div>
	</div>

@stop