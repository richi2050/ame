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
                    {{$user->links()}}
            </td>
      </tr>

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
      });


      </script>