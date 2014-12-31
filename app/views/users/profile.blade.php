@extends('layouts.default')


@section('content')


<div class="container">
<br/><br/><br/>
 @include('flash::message')

      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $datos->name." ".$datos->first_name }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->


                <div class=" col-md-9 col-lg-9 ">
                {{Form::open(array('route'=>'save-profile','id'=>'formulario','name'=>'form')) }}
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Nombre:</td>
                        <td>
                        {{ Form::hidden('id',$datos->id,array('class'=>'form-control','id'=>'name')) }}
                            {{ Form::text('name',$datos->name,array('class'=>'form-control','id'=>'name')) }}
                            {{ $errors->first('name','<p class="error-message">:message</p>') }}
                        </td>
                      </tr>
                      <tr>
                        <td>Apellido:</td>
                        <td>
                            {{ Form::text('first_name',$datos->first_name,array('class'=>'form-control','id'=>'name')) }}
                            {{ $errors->first('first_name','<p class="error-message">:message</p>') }}
                        </td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td>
                          {{ Form::text('email',$datos->email,array('class'=>'form-control','id'=>'name')) }}
                          {{ $errors->first('email','<p class="error-message">:message</p>') }}
                        </td>
                      </tr>
                      <tr>
                        <td>Usuario:</td>
                        <td>
                            {{ Form::text('user',$datos->user,array('class'=>'form-control','id'=>'name')) }}
                            {{ $errors->first('user','<p class="error-message">:message</p>') }}
                        </td>
                      </tr>
                      <tr>
                        <td>Contraseña:</td>
                        <td>
                            {{ Form::password('password',array('class'=>'form-control','id'=>'name')) }}
                            {{ $errors->first('password','<p class="error-message">:message</p>') }}
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Verifica Contraseña:
                        </td>
                        <td>
                          {{ Form::password('password_again',array('class'=>'form-control','id'=>'name')) }}
                          {{ $errors->first('password_again','<p class="error-message">:message</p>') }}
                        </td>
                      </tr>
                      <tr>
                      <td colspan="2" align="center">
                        {{ Form::submit('Guardar',array('class' => 'btn btn-primary')) }}
                      </td>
                      </tr>
                    </tbody>
                  </table>
                  {{ Form::close() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@stop