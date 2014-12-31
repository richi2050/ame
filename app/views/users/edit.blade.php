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
                          {{ Form::open(array('route' => 'update-user', 'autocomplete' =>'false' )) }}
                              <legend>Actualizar datos.</legend>
                              <div class="form-group">
                                  {{ Form::label('name', 'Nombre:') }}
                                  {{ Form::hidden('id',$datos->id,array('class'=>'form-control','id'=>'iddd')) }}
                                  {{ Form::text('name',$datos->name,array('class'=>'form-control','id'=>'name')) }}
                                  {{ $errors->first('name','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('first_name', 'Apellido') }}
                                  {{ Form::text('first_name',$datos->first_name,array('class'=>'form-control','id'=>'first_name')) }}
                                  {{ $errors->first('first_name','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('email', 'Email') }}
                                 {{ Form::text('email',$datos->email,array('class'=>'form-control','id'=>'email')) }}
                                 {{ $errors->first('email','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('user', 'Usuario') }}
                                 {{ Form::text('user',$datos->user,array('class'=>'form-control','id'=>'user')) }}
                                 {{ $errors->first('user','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('password', 'Contraseña') }}
                                 {{ Form::password('password',array('class'=>'form-control','id'=>'password')) }}
                                 {{ $errors->first('password','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('password_again', 'Verifica Contraseña') }}
                                 {{ Form::password('password_again',array('class'=>'form-control','id'=>'password_again')) }}
                                 {{ $errors->first('password_again','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                 {{ Form::label('actived', 'Activación') }}
                                 <br/>
                                 {{ Form::select('Activación', array('0' => 'Inactivo', '1' => 'Activo'), $datos->actived ,array('class' => 'form-control'))}}
                              </div>
                              {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
                          {{ Form::close() }}
                      </div>
                  </div>
              </div>


{{--{{ print_r($datos->id); }}

{{ Form::open(array('url' => 'update/'.$datos->id, 'autocomplete' =>'false' )) }}


{{ Form::text('name',$datos->name,array('placeholder'=>'Inserta tu nombre')) }}
<br/>
{{ Form::text('username',$datos->user,array('placeholder'=>'Inserta tu nombre de usuario')) }}
<br/>
{{ Form::password('password',array('placeholder'=>'password')) }}
<br/>
{{ Form::submit('Guardar',array('class'=>'submit', 'id' =>'submit')) }}

{{ Form::close() }}--}}


      </div>
</div>



<script>
 $(document).ready(function(){


 $("#Activación option[value="+ {{ $datos->actived }} +"]").attr("selected",true);

 $('#submit').click(function(){

 /*
 *
 * area de validacion
 * */

 });

 });









</script>
@stop