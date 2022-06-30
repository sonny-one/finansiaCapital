@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container">
      <div class="row">
            @foreach ($propiedades as $propiedades)



            <div class="col">
                  <div class="card" style="width: 18rem;">
                        <img src="{{ $propiedades->url}}" class="card-img-top" alt="...">
                        <div class="card-body">
                              <h5 class="card-title">Propiedad #{{ $propiedades->id}}</h5>
                              <p class="card-text">
                              <table>
                                    <tr>
                                          <th>Tipo</th>
                                          <td>{{ $propiedades->tipo }}</td>
                                    </tr>
                                    <tr>
                                          <th>Nombre</th>
                                          <td>{{ $propiedades->nombre  }}</td>
                                    </tr>
                                    <tr>
                                          <th>Valor</th>
                                          <td>${{ number_format($propiedades->valor, 0, ",", ".");  }}.</td>
                                    </tr>
                              </table>
                              </p>
                              <div class="d-grid gap-2">
                                    @if(auth()->check())

                                    <a class="btn btn-primary btn-block envioSolicitud" data-action="{{ route('admin.solicitud')}} " data-id="{{ $propiedades->id}} " data-idUsuario=" {{ auth()->user()->id}}">Solicitar Visita</a>
                                    @else
                                    <a href="{{ route('login.index') }}" class="btn btn-primary">Solicitar Visita</a>

                                    @endif

                              </div>

                        </div>
                  </div>
            </div>





            @endforeach
      </div>
</div>
@csrf
<div class="ver"></div>
</div>
x
<script>
      $(document).ready(function() {
            $(".envioSolicitud").click(function(e) {
                  e.preventDefault();

                  var url = $(this).attr('data-action');
                  var id = $(this).attr('data-id');
                  var idUsuario = $(this).attr('data-idUsuario');

                  $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                              id_user: idUsuario,
                              id_propiedad: id,
                              _token: $('input[name="_token"]').val()
                        },
                        success: function(dato) {
                              if(dato.nuevo){
                                    
                               alert('Se a generado la solicitud N°' + dato.id + '. \n uno de nuestros ejecutivo se contactara a la brevedad');
                              }else{
                                   alert('Actualmente tienes una solicitud de visita, por lo que no se puede generar otra para esta propiedad') 
                              }
                                              }
                  });

                  $(".loading").fadeOut(300, function() {
                        $(this).remove();
                  });



            });
      });
</script>
@endsection