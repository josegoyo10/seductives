<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('assets/dist/css/dropzone.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href='<?php echo e(url("css/lightbox.css")); ?>'>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container" style="padding-top:40px">
<div class="row text-center">
   <div class="col-md-12">
      <form id="frm_dataEscort" method="POST" >
         <input type="hidden"   id="escort_id"  name="escort_id" value="<?php echo e($query->id); ?>" />
         <input type="hidden" id="perfil_id"  name="perfil_id"  value="<?php echo e($query->id_perfil); ?>" />
         <?php echo csrf_field(); ?>
         <div class="row">
            <div class="alert alert-success alert-dismissible fade in" role="alert" id="ajax-alert" style="display:none;">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
               <strong> Su registro ha sido Exitoso...!!</strong>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Nombres </label>
                  <input type="text" class="form-control"  id="nombre_escort" name="nombre_escort" 
                  value="<?php echo e($query->nombres); ?>" 
                  <?php echo e(auth()->user()->hasRole('Admin') ? 'disabled' : ''); ?> >
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control"  id="apellido_escort" name="apellido_escort" value="<?php echo e($query->apellidos); ?>" 
                  <?php echo e(auth()->user()->hasRole('Admin') ? 'disabled' : ''); ?>>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Edad</label>
                  <input type="text" class="form-control"  id="edad_escort" name="edad_escort" value="<?php echo e($query->edad); ?>" 
                  <?php echo e(auth()->user()->hasRole('Admin') ? 'disabled' : ''); ?>>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-4">
               <div class="form-group">
                  <label>Region </label>
                  <select name="region_escort" id="region_escort" class="form-control">
                     <option value="">Seleccione una Region</option>
                     <?php $__currentLoopData = $regiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <option value="<?php echo e($region->id); ?>" 
                     <?php echo e($query->region == $region->id ? 'selected' : ''); ?>

                     ><?php echo e($region->nombre); ?></option>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Comuna</label>
                  <select name="comuna_escort" id="comuna_escort" class="form-control">
                     <option value="<?php echo e($sql_desc_comuna->id); ?>"  selected ><?php echo e($sql_desc_comuna->nombre); ?>

                     </option>
                  </select>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" class="form-control" id="telefono_escort" name="telefono_escort"  value="<?php echo e($query->telefono); ?>"   
                  <?php echo e(auth()->user()->hasRole('Admin') ? 'disabled' : ''); ?>>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="form7">Comentario Escort</label>
                  <textarea id="form7" class="md-textarea form-control"  id="comentario_escort" name="comentario_escort" 
                  rows="3" style="overflow:auto;resize:none"    
                  <?php echo e(auth()->user()->hasRole('Admin') ? 'disabled' : ''); ?>><?php echo e($query->comentario_escort); ?></textarea>
               </div>
            </div>
         </div>
         <?php if(auth()->user()->hasRole('Admin')): ?>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="form7">Comentario (APROBACION/RECHAZO):</label>
                  <textarea id="comentario_aprob_rechazo" class="md-textarea form-control" rows="3"
                     style="overflow:auto;resize:none"  ><?php echo e($query->comentario_aprob_rechazo); ?></textarea>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                  <label>SELECCIONE EL ESTADO INGRESO DE LA ESCORT</label>
                  <select id="estado" class="form-control" >
                     <option value="0">«« SELECCIONE »»</option>
                     <option value="1" <?php echo $query->id_estado == "1" ? 'selected' : ''; ?>>PENDIENTE</option>
                     <option value="2" <?php echo $query->id_estado == "2" ? 'selected' : ''; ?>>RECHAZADO</option>
                     <option value="3" <?php echo $query->id_estado == "3" ? 'selected' : ''; ?>>APROBADO</option>
                  </select>
               </div>
            </div>
         </div>
         <?php endif; ?>
         <div class="row">
            <div class="col-md-2">
               <div class="form-group">
                  <a href="<?php echo e(route('admin')); ?>" class="btn btn-primary">Regresar</a>
               </div>  
            </div>
            <div class="col-md-2">
               <div class="form-group">
                  <?php if(auth()->user()->hasRole('Admin')): ?>
                  <a href="#" class="btn btn-primary" id="btn_estado">Actualizar Estado</a>
                  <?php else: ?>
                  <a href="#" class="btn btn-primary" id="btnActualizarPerfil">Actualizar Mi Perfil</a>
                  <?php endif; ?>
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
                  action=" <?php echo e(route('files.store')); ?>"  
                  enctype="multipart/form-data" method="POST" onsubmit="return subirFotos()">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" id="id_escort"  name="id_escort"  value="<?php echo e($query->id); ?>" />
                  <input type="hidden" id="id_perfil"  name="id_perfil"  value="<?php echo e($query->id_perfil); ?>" />
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
         <a href="<?php echo e(url('uploads/escort_fotos/'.$query->foto_principal)); ?>" data-toggle="lightbox" data-gallery="example-gallery"  class="col-sm-4">
         <img src="<?php echo e(url('uploads/escort_fotos/'.$query->foto_principal)); ?>" class="img-fluid" style="width:220px">
         </a>
         <a href= "<?php echo e(url('uploads/escort_fotos/'.$query->foto_secundaria_1)); ?>" data-toggle="lightbox" 
            data-gallery="example-gallery"  class="col-sm-4">
         <img src= "<?php echo e(url('uploads/escort_fotos/'.$query->foto_secundaria_1)); ?>" class="img-fluid"  style="width:220px">
         </a> 
         <a href= "<?php echo e(url('uploads/escort_fotos/'.$query->foto_secundaria_2)); ?>" data-toggle="lightbox" data-gallery="example-gallery"   class="col-sm-4">
         <img src= "<?php echo e(url('uploads/escort_fotos/'.$query->foto_secundaria_2)); ?>" class="img-fluid"  style="width:220px">
         </a>
     
      </div>
      <?php if($sql_foto_escort != ''): ?>
      <div class="row" style="padding-top: 8px;">
         <div class="col-md-12">
            <?php $__currentLoopData = $sql_foto_escort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/uploads_escorts/<?php echo e($foto->url_fotos); ?>" data-toggle="lightbox" data-gallery="example-gallery"  class="col-sm-4" >
            <img src="/uploads_escorts/<?php echo e($foto->url_fotos); ?>" class="img-fluid" style="width:220px">
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
      </div>
      <?php endif; ?>
   </div>
</div>
<?php $__env->stopSection(); ?>
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<?php echo Html::script('assets/dist/js/dropzone.js');; ?>

<script src="/js/funciones/funciones.js"></script>
<script src='<?php echo e(url("js/ekko-lightbox.js")); ?>'></script>
<script src='<?php echo e(url("js/jquery-ui.js")); ?>'></script>


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
                url:  "<?php echo e(route('admin.clientes.updateEstado')); ?>?id_option=" + id +"&escort_id=" + escort_id + "&comentario_aprob_rechazo=" + comentario_aprob_rechazo,
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/clientes/show.blade.php ENDPATH**/ ?>