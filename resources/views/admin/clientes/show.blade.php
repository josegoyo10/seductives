@extends('admin.layout')

 <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" href='{{ url("adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}'>
@section('content')


   <div class="row">

   <div class="alert alert-success alert-dismissible fade in" role="alert" id="ajax-alert" style="display:none;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                    <strong> Su registro ha sido Exitoso...!!</strong>
                                 </div>

      <form role="form">
        <input type="hidden" id="escort_id" value="{{ $query->id}}" />
         <div class="col-md-4">
            <div class="form-group">
               <label>Nombres</label>
               <input type="text" class="form-control"  value="{{ $query->nombres }}" disabled>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label>Apellidos</label>
               <input type="text" class="form-control"  value="{{ $query->apellidos }}" disabled>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label>Edad</label>
               <input type="text" class="form-control"  value="{{ $query->edad }}" disabled>
            </div>
         </div>
      </form>
   </div>
   <div class="row">
      <form role="form">
         <div class="col-md-4">
            <div class="form-group">
               <label>Region</label>
               <input type="text" class="form-control"  value="{{ $query->region }}" disabled>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label>Comuna</label>
               <input type="text" class="form-control"  value="{{ $query->comuna }}" disabled>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <label>Teléfono</label>
               <input type="text" class="form-control"  value="{{ $query->telefono }}" disabled>
            </div>
         </div>
      </form>
   </div>

   <div class="row">
      <div class="col-md-12">
            <div class="form-group">
              <label for="form7">Comentario Escort</label>
              <textarea id="form7" class="md-textarea form-control" rows="3" style="overflow:auto;resize:none"  disabled>{{ $query->comentario_escort }}</textarea>
            </div>
      </div>
   </div>

  
   <div class="row">
      <div class="col-md-12">
            <div class="form-group">
              <label for="form7">Comentario (APROBACION/RECHAZO):</label>
              <textarea id="comentario_aprob_rechazo" class="md-textarea form-control" rows="3"
               style="overflow:auto;resize:none"  >{{ $query->comentario_aprob_rechazo }}</textarea>
            </div>
      </div>
   </div>  

 
 <div class="row">
      <div class="col-md-12">
            <div class="form-group">
               <label>SELECCIONE EL ESTADO INGRESO DE LA ESCORT</label>
               <select id="estado" class="form-control" >
                  <option value="0">«« SELECCIONE »»</option>
                  <option value="1" {!! $query->id_estado == "1" ? 'selected' : '' !!}>PENDIENTE</option>
                  <option value="2" {!! $query->id_estado == "2" ? 'selected' : '' !!}>RECHAZADO</option>
                  <option value="3" {!! $query->id_estado == "3" ? 'selected' : '' !!}>APROBADO</option>
                  </select>
              </div>
       </div>
</div>
<div class="row">
   <div class="col-md-2">
      <div class="form-group">
      <a href="{{ url()->previous() }}" class="btn btn-info">Regresar</a>
      </div>
    </div>
      <div class="col-md-2">
       <div class="form-group">
         <a href="#" class="btn btn-primary" id="btn_estado">Actualizar Estado</a>
      </div>
    </div>
</div>

<hr>
<div class="container text-center">
   <div class="col-md-8">
      <div class="row">
        <a href="{{ $query->foto_principal }}" data-toggle="lightbox" data-gallery="example-gallery"  class="col-sm-4">
            <img src="{{ $query->foto_principal }}" class="img-fluid" style="width:220px">
            </a>
          
         <a href="{{ $query->foto_secundaria_1 }}" data-toggle="lightbox" 
            data-gallery="example-gallery"  class="col-sm-4">
             <img src="{{ $query->foto_secundaria_1 }}" class="img-fluid"  style="width:220px">
         </a>
         <a href="{{ $query->foto_secundaria_2 }}" data-toggle="lightbox" data-gallery="example-gallery"   class="col-sm-4">
            <img src="{{ $query->foto_secundaria_2 }}" class="img-fluid"  style="width:220px">
            </a>
      </div>
   </div>
</div>
@endsection


<script src="/js/jquery-2.1.4.min.js"></script>


<script>
  $( document ).ready(function() {
     
      $('#btn_estado').click(function () {
            var id        = $( "#estado option:selected" ).val();
            var escort_id = $('#escort_id').val();
            var comentario_aprob_rechazo = $('#comentario_aprob_rechazo').val();
            // alert("id:" + id);
         if (id == "0") {
            alert('Por favor seleccione el estado de la solicitud de la clienta');

         } else {
           
            $.ajax({
               type: 'get',
               url:  "{{ route('admin.clientes.updateEstado') }}?id_option=" + id +"&escort_id=" + escort_id + "&comentario_aprob_rechazo=" + comentario_aprob_rechazo,
               method: 'GET',
               success: function (data) {
                     // the next thing you want to do 
                   console.log(data);
                   $('#ajax-alert').show().delay(3000).fadeOut();
                        
                     }
            
                  
                  });

               }
            });
            

});
</script>