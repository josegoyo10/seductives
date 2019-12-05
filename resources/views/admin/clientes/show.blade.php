@extends('admin.layout')
@section('css')
<link href="{{ asset('assets/dist/css/dropzone.css') }}" rel="stylesheet">
<link rel="stylesheet" href='{{ url("css/lightbox.css") }}'>
@endsection
@section('content')
<div class="container" style="padding-top:40px">
<div class="row text-center">
   <div class="col-md-12">
      <form id="frm_dataEscort" method="POST" >
         <input type="hidden"   id="escort_id"  name="escort_id" value="{{ $query->id}}" />
         <input type="hidden" id="perfil_id"  name="perfil_id"  value="{{ $query->id_perfil}}" />
         @csrf
         <div class="row">
            <div class="alert alert-success alert-dismissible fade in" role="alert" id="ajax-alert" style="display:none;">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
               <strong> Operación Exitosa...!!</strong>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Nombres </label>
                  <input type="text" class="form-control"  id="nombre_escort" name="nombre_escort" 
                  value="{{ $query->nombres }}" 
                  {{ auth()->user()->hasRole('Admin') ? 'disabled' : '' }} >
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control"  id="apellido_escort" name="apellido_escort" value="{{ $query->apellidos }}" 
                  {{ auth()->user()->hasRole('Admin') ? 'disabled' : '' }}>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Edad</label>
                  <input type="text" class="form-control"  id="edad_escort" name="edad_escort" value="{{ $query->edad }}" 
                  {{ auth()->user()->hasRole('Admin') ? 'disabled' : '' }}>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label>Region </label>
                  <select name="region_escort" id="region_escort" class="form-control">
                     <option value="">Seleccione una Region</option>
                     @foreach ($regiones as $region)
                     <option value="{{$region->id}}" 
                     {{ $query->region == $region->id ? 'selected' : '' }}
                     >{{ $region->nombre }}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Comuna</label>
                  <select name="comuna_escort" id="comuna_escort" class="form-control">
                     <option value="{{$sql_desc_comuna->id}}"  selected >{{ $sql_desc_comuna->nombre }}
                     </option>
                  </select>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" class="form-control" id="telefono_escort" name="telefono_escort"  value="{{ $query->telefono }}"   
                  {{ auth()->user()->hasRole('Admin') ? 'disabled' : '' }}>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="form7">Comentario Escort</label>
                  <textarea id="form7" class="md-textarea form-control"  id="comentario_escort" name="comentario_escort" 
                  rows="3" style="overflow:auto;resize:none"    
                  {{ auth()->user()->hasRole('Admin') ? 'disabled' : '' }}>{{ $query->comentario_escort }}</textarea>
               </div>
            </div>
         </div>
         @if (auth()->user()->hasRole('Admin'))
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
         @endif
         <div class="row">
            <div class="col-md-2">
               <div class="form-group">
                  <a href="{{  route('admin') }}" class="btn btn-primary">Regresar</a>
               </div>  
            </div>
            <div class="col-md-2">
               <div class="form-group">
                  @if (auth()->user()->hasRole('Admin'))
                  <a href="#" class="btn btn-primary" id="btn_estado">Actualizar Estado</a>
                  @else
                  <a href="#" class="btn btn-primary" id="btnActualizarPerfil">Actualizar Mi Perfil</a>
                  @endif
               </div>
            </div>
      </form>
      </div>
   </div>
</div>
<hr>
<div class="container">
   <div class="row">
      <div class="col-md-10">
         <div class="panel panel-primary">
            <div class="panel-heading">
               Mis Fotos
            </div>
            <div class="panel-body">
               <form class="dropzone" id="my-dropzone" 
                  action=" {{route('files.store')}}"  
                  enctype="multipart/form-data" method="POST" onsubmit="return subirFotos()">
                  @csrf
                  <input type="hidden" id="id_escort"  name="id_escort"  value="{{ $query->id}}" />
                  <input type="hidden" id="id_perfil"  name="id_perfil"  value="{{ $query->id_perfil}}" />
                  <div class="dz-message" style="height:200px;">
                     Arrastras tus fotos hasta aqui
                  </div>
                  <div class="dropzone-previews"></div>
                  <button type="text"   class="btn btn-success"  
                     id="submit">Subir</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<hr>
<div class="container text-center">
   <div class="col-md-8">
      <div class="row">
         <a href="{{ url('uploads/escort_fotos/'.$query->foto_principal) }}" data-toggle="lightbox" data-gallery="example-gallery"  class="col-sm-4">
         <img src="{{ url('uploads/escort_fotos/'.$query->foto_principal) }}" class="img-fluid" style="width:220px">
         </a>
         <a href= "{{ url('uploads/escort_fotos/'.$query->foto_secundaria_1) }}" data-toggle="lightbox" 
            data-gallery="example-gallery"  class="col-sm-4">
         <img src= "{{ url('uploads/escort_fotos/'.$query->foto_secundaria_1) }}" class="img-fluid"  style="width:220px">
         </a> 
         <a href= "{{ url('uploads/escort_fotos/'.$query->foto_secundaria_2) }}" data-toggle="lightbox" data-gallery="example-gallery"   class="col-sm-4">
         <img src= "{{ url('uploads/escort_fotos/'.$query->foto_secundaria_2) }}" class="img-fluid"  style="width:220px">
         </a>
     
      </div>
      @if ($sql_foto_escort != '')
      <div class="row" style="padding-top: 8px;">
         <div class="col-md-12">
            @foreach ($sql_foto_escort as $foto)
            <a href="/uploads_escorts/{{$foto->url_fotos}}" data-toggle="lightbox" data-gallery="example-gallery"  class="col-sm-4" >
            <img src="/uploads_escorts/{{$foto->url_fotos}}" class="img-fluid" style="width:220px">
            </a>
            @endforeach
         </div>
      </div>
      @endif
   </div>
</div>
@endsection
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{!! Html::script('assets/dist/js/dropzone.js'); !!}
<script src="/js/funciones/funciones.js"></script>
<script src='{{url("js/ekko-lightbox.js") }}'></script>
<script src='{{url("js/jquery-ui.js") }}'></script>


<script>
   $j=jQuery.noConflict();
   $j(document).ready(function() {

       $j(document).on('click', '[data-toggle="lightbox"]', function(event) {
                        event.preventDefault();
                        $j(this).ekkoLightbox();
                     });
    

   
      //subir fotos de las escorts.
       Dropzone.options.myDropzone = {
                autoProcessQueue: false,
                uploadMultiple: true,
                maxFilezise: 10,
                maxFiles: 2,
            
                init: function() {
                    var submitBtn = document.querySelector("#submit");
                    myDropzone = this;
                    
                    submitBtn.addEventListener("click", function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
   
                    });
                    this.on("addedfile", function(file) {
                       // alert("file uploaded");
   
                    });
                    
                    this.on("complete", function(file) {
                       location.reload(true);
                        myDropzone.removeFile(file);
                    });
     
                    this.on("success", 
                        myDropzone.processQueue.bind(myDropzone)
                    );
                }
            };
   
   
      //actualizar el estado de la clienta.
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
             
        // actualizar los datos de la escort.
   
        $('#btnActualizarPerfil').on('click', function(e) {
            e.preventDefault();
   
             var data = $("#frm_dataEscort").serialize();
            $.ajax({
                type: "post",
                url: "/admin/updateEscort_info",
                data: data,
                dataType: "json",
                success: function(data) {
                    //console.log('success');
                    if(data.success == 1) {
                        $('#ajax-alert').html('Perfil Actualizado Exitosamente').show().delay(3000).fadeOut();
                    }
                },
                error: function(error) {
                    console.log('error');
                }
            });
   
        });
   
   
       //actualizar combo de regiones y comuna
   
         //para refrescar el combo de factores reporte 5
      $('select[name="region_escort"]').on('change', function() {
            var stateID = $(this).val();
            $('select[name="comuna_escort"]').empty();
         //   alert('stateid:'+ stateID);
   
          if(stateID) {
                $.ajax({
                   // url: '/admin/updatecomuna/'+stateID,
                   url: '/admin/actualizarcomuna/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
   
                     $.each(data.comuna, function(i, comuna){
                        //do something
                        //console.log(comuna.nombre);
                        $('select[name="comuna_escort"]').append('<option value="'+ comuna.id +'">'+ comuna.nombre+'</option>');
                     });
   
   
                     //   $('select[name="comuna_escort"]').empty();
                     if(data == ""){
                            $('select[name="comuna_escort"]').append('<option value="0">'+'«« No hay Comunas »»'+'</option>');
                             
                          }
                     
                       
                    },
                      
   
                      fail: function(jqXHR, textStatus, errorThrown){ 
                      alert('Error: ' + jqXHR.responseText); 
        
                     }
                 });
              }else{
              
                //$('select[name="factor_id"]').empty();
                
            }
    });
   
   })//fin jquery;
</script>