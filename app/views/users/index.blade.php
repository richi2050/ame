@extends('layouts.default')
@section('css')
<link rel="stylesheet" href="{{ asset('boostrap/dist/css/theme.css') }}"/>
@stop


@section('content')

<br/><br/>
 @include('flash::message')

<table class="table table-striped">
    <thead>
        <tr>
           {{-- <th>id</th>--}}
            <th>nombre</th>
            <th>usuario</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
@foreach($user as $us)
    @if($us->actived == 0)
    <tr class="danger">
       {{-- <td>{{ $us->id  }}</td>--}}
        <td>{{ $us->name }}</td>
        <td>{{ $us->user }}</td>
        <td>
        <a href="{{ URL::to('edit',$us->id)}}" class="btn btn-info btn-cons">Editar</a>
        <a href="{{URL::to('user/destroy',$us->id)}}" class="btn btn-danger btn-cons">Eliminar</a>
         <a href="{{URL::to('user/change',$us->id)}}" class="btn btn-warning btn-cons">Contraseña</a>
       </td>
    </tr>
    @else
    <tr >
        {{--<td>{{ $us->id  }}</td>--}}
        <td>{{ $us->name }}</td>
        <td>{{ $us->user }}</td>
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

                {{$user->links()}}
            </td>
      </tr>
      </tbody>
</table>

@stop