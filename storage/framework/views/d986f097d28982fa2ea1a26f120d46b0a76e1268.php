<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="row">
      <div class="col-sm-4">
         <div class="text-center">
            <h2 class="text-center"><?php echo e($data->apodo_escort); ?> </h2>
            <img src="<?php echo e(url('uploads/escort_fotos/'.$data->foto_principal)); ?>"  class="rounded" alt="">
         </div>
         <br>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-4" style="color:#FFFFFF;">Edad: <?php echo e($data->edad); ?> años</div>
            <div class="col-md-8" style="color:#FFFFFF;">Whatsapp: 
               <a href="https://api.whatsapp.com/send?phone=<?php echo e(str_replace('+', '', $telefono_whatsapp)); ?>&text=Hola he visto tu perfil y quiero que nos juntemos." 
                  class="btn btn-success" target="_blank">
               <i class="fa fa-whatsapp" aria-hidden="true"></i>
               </a>                 
            </div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">Ubicación:  <?php echo e($data->descripcion_region); ?>, <?php echo e($data->descripcion_comuna); ?></div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-4" style="color:#FFFFFF;">Altura:  <?php echo e($data->altura); ?></div>
            <div class="col-md-7" style="color:#FFFFFF;">Médidas: <?php echo e($data->medidas); ?></div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-6" style="color:#FFFFFF;">Atención:  <?php echo e($data->atencion); ?></div>
            <div class="col-md-6" style="color:#FFFFFF;">Teléfono: <?php echo e(str_replace('+56', '', $telefono_escort)); ?></div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">Días Disponible:  <?php echo e($data->dias_disponibles); ?></div>
         </div>
         <hr>
         <div class="row" style="margin-left:0px;">
            <div class="col-md-5" style="color:#FFFFFF;">Precio:  <?php echo e($precio_escort); ?></div>
            <div class="col-md-6" style="color:#FFFFFF;">Color de Piel:  &nbsp;<?php echo e($data->color_piel); ?></div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">Servicios:
            <br>
               <?php $__currentLoopData = $servicio_escort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <ul class="fa-ul">
                   <li><span class="fa-li"><i class="fa fa-check-square"></i></span><?php echo e($row->nombre_servicio); ?></li>
 
               </ul>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <!-- <?php
                   $array_services[] = ucfirst($row->nombre_servicio);
               ?>
         
               <?php if(isset($array_services)): ?>
                  
              
              <?php echo e(implode(',', $array_services)); ?>

               <?php endif; ?> -->
            
              
            </div>
         </div>
         <hr>
      </div>
      <div class="col-sm-5" style="margin-left:60px; padding-top:40px;">
         
            <div class="panel panel-default">
               <div class="panel-heading">Sobre Mi</div>
                  <div class="panel-body"> <p><?php echo e($data->descripcion); ?></p></div>
               </div>
           
            
            <div class="panel panel-default">
               <div class="panel-heading">Comentarios</div>
                  <div class="panel-body"> <p><?php echo e($data->descripcion); ?></p></div>
               </div>
            </div>

         </div>
     </div>

   <div class="row" style="margin-left:0px;">
      <div class="col-xs-3" >
         <div class="thumbnail">
            <figure><a href="<?php echo e(url('uploads/escort_fotos/'.$data->foto_principal)); ?>">
               <img src="<?php echo e(url('uploads/escort_fotos/'.$data->foto_principal)); ?>"  alt=""  style="width:100%;">
               </a>
            </figure>
         </div>
      </div>
      <div class="col-xs-3">
         <div class="thumbnail">
            <figure><a href="<?php echo e(url('uploads/escort_fotos/'.$data->foto_secundaria_1)); ?>">
               <img src="<?php echo e(url('uploads/escort_fotos/'.$data->foto_secundaria_1)); ?>"  alt=""  style="width:100%;">
               </a>
            </figure>
         </div>
      </div>
      <div class="col-xs-3">
         <div class="thumbnail">
            <figure><a href="<?php echo e(url('uploads/escort_fotos/'.$data->foto_secundaria_2)); ?>">
               <img src="<?php echo e(url('uploads/escort_fotos/'.$data->foto_secundaria_2)); ?>"  alt=""  
                  style="width:100%">
               </a>
            </figure>
         </div>
      </div>
      <br>
   </div>
   <!--row !-->  
</div>
<!--Container !-->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/jquery.ui.totop.js')); ?>"></script>
<script src="<?php echo e(asset('js/touchTouch.jquery.js')); ?>"></script>
<script>
   $(window).load(function() {
     // Initialize the gallery
    $('.thumbnail figure a').touchTouch();
   });
</script>
<?php $__env->stopPush(); ?>
</body>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives\resources\views/escort/perfilpublico_escort.blade.php ENDPATH**/ ?>