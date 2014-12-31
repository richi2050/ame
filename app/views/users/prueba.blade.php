@extends('layouts.default')
@section('css')
<link rel="stylesheet" href="{{ asset('boostrap/dist/css/theme.css') }}"/>
@stop


@section('content')

<br/><br/>
 @include('flash::message')

<div class="panel panel-default col-md-9 col-lg-9 ">
 <table width="100%">
     <tr>
        <td  align="center">
        <br/>
              <a href="{{ URL::to('new/user') }}" style="color:#ffffff;" class="glyphicon glyphicon-plus btn btn-success">
              </a>
        </td>
     </tr>
 </table>


     <div class="form-group">

           {{ Form::open() }}
           {{ Form::label('name', 'Nombre:') }}
           {{ Form::text('usuario','',array('class'=>'form-control','id'=>'usuario')) }}

           {{ Form::close() }}
     </div>
</div>
<br/>
<table class="table table-striped">
    <thead>
        <tr>
           {{-- <th>id</th>--}}
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody id="paginacionAjax">
@foreach($user as $us)
    @if($us->actived == 0)
    <tr class="danger">
       {{-- <td>{{ $us->id  }}</td>--}}
        <td width="20%">{{ $us->name }}</td>
        <td width="20%">{{ $us->user }}</td>
        <td>
        <a href="{{ URL::to('edit',$us->id)}}" class="btn btn-info btn-cons">Editar</a>
        <a href="{{URL::to('user/destroy',$us->id)}}" class="btn btn-danger btn-cons">Eliminar</a>
         <a href="{{URL::to('user/change',$us->id)}}" class="btn btn-warning btn-cons">Contraseña</a>
       </td>
    </tr>
    @else
    <tr >
        {{--<td>{{ $us->id  }}</td>--}}
        <td width="20%">{{ $us->name }}</td>
        <td width="20%">{{ $us->user }}</td>
        <td>
        <a href="{{ URL::to('edit',$us->id)}}" class="btn btn-info btn-cons">Editar</a>
        <a href="{{URL::to('user/destroy',$us->id)}}" class="btn btn-danger btn-cons">Eliminar</a>
        <a href="{{URL::to('user/change',$us->id)}}" class="btn btn-warning btn-cons">Contraseña</a>
        </td>
    </tr>
    @endif

@endforeach

      <tr>
            <td colspan="4" align="center">
                <div class="panel radius" id="links">
                    {{$user->links()}}
                </div>
            </td>


      </tr>
      </tbody>
</table>

<script>
$(document).ready(function()
{
    $(".pagination a").bind("click",function(e)
    {
        e.preventDefault();
        var urlPagination = $(this).attr('href');
        $.ajax({
            url: urlPagination,
            type: "GET",
            beforeSend: function()
            {
                $('#loadAjax').show();
            },
            success: function(data)
            {
                $('#loadAjax').hide();
                $("#paginacionAjax").empty().html(data.renderPagination);
            },
            error: function()
            {
                alert('Error obteniendo respuesta del servidor, prueba más tarde.');
            }
        });
    });



    $("#usuario").on("keyup", function(e) {
        var search_string = $(this).val();
        $.ajax({
                type: "GET",
                url: "user",
                data: { query: search_string },
                cache: false,
                success: function(data){
                    $("#paginacionAjax").empty().html(data.renderPagination);
                }
            });

        return false;
    });


});


</script>

@stop