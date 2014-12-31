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
                           {{ Form::open(array('route' => 'update-product', 'autocomplete' =>'false' )) }}
                              <legend>Actualizar datos.</legend>
                              <div class="form-group">
                                  {{ Form::label('name', 'Nombre:') }}
                                  {{ Form::hidden('id',$datos->id,array('class'=>'form-control','id'=>'iddd')) }}
                                  {{ Form::text('name',$datos->name,array('class'=>'form-control','id'=>'name')) }}
                                  {{ $errors->first('name','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('description', 'Descripción:') }}
                                  {{ Form::textarea('description',$datos->description,array('class'=>'form-control','id'=>'description','size' => '30x5')) }}
                                  {{ $errors->first('description','<p class="error-message">:message</p>') }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('actived', 'Activación') }}
                                  {{ Form::select('Activación', array('0' => 'Inactivo', '1' => 'Activo'), $datos->actived ,array('class' => 'form-control'))}}
                              </div>
                              {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
                          {{ Form::close() }}
                      </div>
                  </div>
              </div>
 @stop