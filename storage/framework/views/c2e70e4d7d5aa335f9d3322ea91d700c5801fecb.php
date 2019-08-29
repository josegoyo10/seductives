<?php $__env->startSection('content'); ?>
<div class="box box-info">
   <div class="box-header with-border">
      <h3 class="box-title">Solicitudes de Amistad</h3>
   </div>
   <!-- /.box-header -->
   <!-- form start -->
   <?php if(Session::has('errors')): ?>
   <div class="alert alert-danger" role="alert">
      <?php if($errors->any()): ?>
      <h4><?php echo e($errors->first()); ?></h4>
      <?php endif; ?>
   </div>
   <?php endif; ?>
   <?php if(\Session::has('success')): ?>
   <div class="alert alert-success">
      <ul>
         <li><?php echo \Session::get('success'); ?></li>
      </ul>
   </div>
   <?php endif; ?> 

  <?php $__currentLoopData = $list_friendship; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

             <?php if($row->status_invitacion == 1): ?>
               <div class="box-header with-border">
                  <div class="col-sm-4">
                     <p class="text"><?php echo $row->name; ?> <?php echo $row->last_name; ?></p>
                  </div>
                  <div class="col-sm-2 col-md-offset-2">
                      <form class="form-horizontal" action="<?php echo e(URL::to('admin/confirmfriendship')); ?>" method="POST" >
                        <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                        <input type="hidden" value="<?php echo e($row->sender_id); ?>" name="id_usuario">
                        <input type="hidden" value="<?php echo e($row->receiver_id); ?>" name="id_escort">
                        <button type="submit" class="btn btn-primary">Confirmar Amistad</button>
                    </form>
                  </div>

                  <div class="col-sm-4">
                     <button type="submit" class="btn btn-default">Eliminar Solicitud
                     </button>
                  </div>
                  <!-- /.box-body -->
               </div>
            <?php endif; ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/clientes/request_friendship.blade.php ENDPATH**/ ?>