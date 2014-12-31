@extends('layouts.default')
@section('css')
<link rel="stylesheet" href="{{ asset('boostrap/dist/css/theme.css') }}"/>
@stop


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
                          {{ Form::open(array('route' => 'config-save', 'autocomplete' =>'false' )) }}
                              <legend>Actualizar datos.</legend>
                              <div class="form-group">
                                  {{ Form::label('ip', 'Direccion Ip:') }}
                                  {{ Form::text('Ip',empty($datos[0])?'' :$datos[0]->value,array('class'=>'form-control','id'=>'ip')) }}
                                  {{ $errors->first('Ip','<p class="error-message">:message</p>') }}
                              </div>
                               {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
                          {{ Form::close() }}
                      </div>
                  </div>
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





@stop