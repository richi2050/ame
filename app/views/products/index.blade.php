@extends('layouts.default')


@section('content')

<br/><br/>
<br/>
 @include('flash::message')
 <div class="panel panel-default col-md-9 col-lg-9 ">
  <table width="100%">
      <tr>
         <td  align="center">
         <br/>
               <a href="{{ URL::to('new/product') }}" style="color:#ffffff;" class="glyphicon glyphicon-plus btn btn-success">
               </a>
         </td>
      </tr>
  </table>
<br/>


 </div>
 <br/>

<table class="table table-striped">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>descripción</th>
            <th>option</th>
        </tr>
    </thead>
    <tbody>
@foreach($producto as $produc)
    @if($produc->actived ==0)
    <tr class="danger">
            <td>{{ $produc->id  }}</td>
            <td>{{ $produc->name }}</td>
            <td>{{ substr($produc->description,0,40).'...' }}</td>
            <td>
            <a href="{{ URL::to('product/edit',$produc->id)}}" class="btn btn-info btn-cons">Editar</a>
            <a href="{{URL::to('product/destroy',$produc->id)}}" class="btn btn-danger btn-cons">Eliminar</a>
            </td>
        </tr>
    @else
    <tr >
        <td>{{ $produc->id  }}</td>
        <td>{{ $produc->name }}</td>
        <td>{{ substr($produc->description,0,40).'...' }}</td>
        <td>
        <a href="{{ URL::to('product/edit',$produc->id)}}" class="btn btn-info btn-cons">Editar</a>
        <a href="{{URL::to('product/destroy',$produc->id)}}" class="btn btn-danger btn-cons">Eliminar</a>
        </td>
    </tr>
    @endif

@endforeach

      <tr>
            <td colspan="4" align="center">

                {{$producto->links()}}
            </td>
      </tr>
      </tbody>
</table>

@stop