@extends('layouts.app')

@section('title', 'Admin')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-2/3 border border-gray-200 
rounded-lg shadow-lg">
  <h1>Solicitudes de Visitas</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Solicitante</th>
        <th scope="col">Propiedad</th>
        <th scope="col">Ejecutivo Asignado</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">

      @foreach ($solicitudes as $solicitud)

      <tr>
        <th scope="row">
          
          {{$solicitud->idInteresado}}
          {{$solicitud->nombreInteresado}}
          {{$solicitud->emailInteresado}}
        </th>
        <td>{{$solicitud->propiedad}}</td>
        <td>
   
          <select id="{{$solicitud->idSolicitud}}" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected value="0">Seleccione</option>
            <?php 
           $a=0;
            foreach ($ejecutivos as $ejecutivo){ 
              $selected = '';
              if($ejecutivo->id == $solicitud->idEjecutivo){
                $selected = 'selected';
              }
              ?>
           
            <option value="{{ $ejecutivo->id}}"  <?=  $selected ?> >{{$ejecutivo->name}}</option>
<?php } ?>
          </select>
        </td>
        <td><button type="button"   data-id="{{$solicitud->idSolicitud}}" class="btn btn-outline-primary Asignar">Asignar Ejecutivo</button></td>

      </tr>
      @endforeach


    </tbody>
  </table>
 
  @csrf
</div>
<script>
  $(document).ready(function() {
    $(".Asignar").click(function(e) {
      e.preventDefault();
      var idSolicitud = $(this).attr('data-id');
      var idEjecutivo = $('#'+idSolicitud).val();
 
      if(idEjecutivo == 0 ){
        alert('Seleccion un ejecutivo')
        $('#'+idSolicitud).focus();
        return 0;
      }
 
 
      $.ajax({
        url: "{{route('admin.asignaVendedor')}}",
        type: 'POST',
        data: {
          idSolicitud : idSolicitud,
          idEjecutivo : idEjecutivo,
          _token: $('input[name="_token"]').val()
        },
        success: function(dato) {
 
         if(dato.id){
          alert('Ejecutivo asignado');
         }

        }
      });

    });
  });
</script>
@endsection