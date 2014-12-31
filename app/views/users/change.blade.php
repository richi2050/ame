@extends('layouts.default')
@section('css')

@stop


@section('content')
 <div class="container">
 <br/><br/><br/>
   @include('flash::message')
    <div class="row">
        <div class="container">
            <div class="panel panel-default col-md-9 col-lg-9 ">
                <div class="panel-body">
                    {{Form::open(array('route' => 'save-change'))}}
                        <div class="form-group">
                           {{ Form::label('contrasena', 'Contraseña:') }}
                           {{ Form::hidden('id',$id,array('class'=>'form-control','id'=>'iddd')) }}
                           {{ Form::password('Contraseña',array('class'=>'form-control','id'=>'contrasena')) }}
                           {{ $errors->first('Contraseña','<p class="error-message">:message</p>') }}
                        </div>
                        <div class="form-group">
                           {{ Form::label('password_again', 'Verifica Contraseña') }}
                           {{ Form::password('Verifica',array('class'=>'form-control','id'=>'password_again')) }}
                           {{ $errors->first('Verifica','<p class="error-message">:message</p>') }}
                        </div>
                        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
  </div>

@stop