 @extends('layouts.default')
 @section('content')
 <br/><br/><br/>
  @include('flash::message')

              <div class="container">
                  <div class="panel panel-default col-md-9 col-lg-9 ">
                      <div class="panel-body">
                          {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
                          @if(Session::has('mensaje_error'))
                              <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                          @endif
                           {{ Form::open(array('route' => 'create-product', 'autocomplete' =>'false' )) }}
                              <legend>Actualizar datos.</legend>
                              <div class="form-group">
                                  {{ Form::label('name', 'Nombre:') }}
                                  {{ Form::text('nombre','',array('class'=>'form-control','id'=>'name')) }}
                                  {{ $errors->first('nombre','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('description', 'Descripción:') }}
                                  {{ Form::textarea('descripcion','',array('class'=>'form-control','id'=>'description','size' => '30x5')) }}
                                  {{ $errors->first('descripcion','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('actived', 'Activación') }}
                                  {{ Form::select('Activación', array('0' => 'Inactivo','1' => 'Activo'), 1 ,array('class' => 'form-control'))}}
                              </div>
                              {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
                          {{ Form::close() }}
                      </div>
                  </div>
              </div>
 @stop