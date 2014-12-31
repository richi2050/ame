@extends('layouts.default')


@section('content')


<div class="container">
<br/><br/><br/>
 @include('flash::message')

      <div class="row">




      <div class="container">
                  <div class="panel panel-default col-md-9 col-lg-9 ">
                      <div class="panel-body">
                          {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                          @if(Session::has('mensaje_error'))
                              <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                          @endif
                          {{ Form::open(array('route' => 'create-user', 'autocomplete' =>'false' )) }}
                              <legend>Actualizar datos.</legend>
                              <div class="form-group">
                                  {{ Form::label('name', 'Nombre:') }}
                                  {{ Form::text('nombre','',array('class'=>'form-control','id'=>'name','placeholder' => 'Ingresa Nombre')) }}
                                  {{ $errors->first('nombre','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('first_name', 'Apellido') }}
                                  {{ Form::text('apellido','',array('class'=>'form-control','id'=>'first_name','placeholder' => 'Ingresa Apellido')) }}
                                  {{ $errors->first('apellido','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('email', 'Email') }}
                                 {{ Form::text('correo','',array('class'=>'form-control','id'=>'email', 'placeholder' => 'ejemplo@dominio.com')) }}
                                 {{ $errors->first('correo','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('user', 'Usuario') }}
                                 {{ Form::text('usuario','',array('class'=>'form-control','id'=>'user','placeholder' => 'Ingresa Usuario')) }}
                                 {{ $errors->first('usuario','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('password', 'Contraseña') }}
                                 {{ Form::password('contraseña',array('class'=>'form-control','id'=>'password','placeholder' => 'Ingresa Contraseña')) }}
                                 {{ $errors->first('contraseña','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('password_again', 'Verifica Contraseña') }}
                                 {{ Form::password('password_again',array('class'=>'form-control','id'=>'password_again','placeholder' => 'Rectifica Contraseña')) }}
                                 {{ $errors->first('password_again','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('actived', 'Activación') }}
                                 <br/>
                                 {{ Form::select('Activación', array('0' => 'Inactivo','1' => 'Activo'), 1 ,array('class' => 'form-control'))}}
                              </div>
                              {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
                          {{ Form::close() }}
                      </div>
                  </div>
              </div>
{{ var_dump($errors); }}


      </div>
</div>




@stop