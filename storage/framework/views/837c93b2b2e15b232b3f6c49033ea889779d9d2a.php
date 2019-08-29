<?php $__env->startSection('content'); ?>
<div class="box box-info">
   <div class="box-header with-border">
      <h3 class="box-title">Subir Video</h3>
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
   <form class="form-horizontal" action="<?php echo e(URL::to('admin/uploadvideo')); ?>" method="POST" enctype="multipart/form-data">
      <div class="box-body">
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Subir Video:</label>
            <div class="col-sm-10">
               <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
               <div class="form-group">
                  <input type="file" name="video" id="video">
               </div>
            </div>
         </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
         <button type="submit" class="btn btn-info pull-center">Subir</button>
      </div>
      <!-- /.box-footer -->
   </form>
   <div class="box-header with-border">
      <h3 class="box-title">Mi Video</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
      <table class="table table-bordered">
         <tr>
            <th style="width: 10px">#</th>
            <th>Nombre</th>
            <th>Acción</th>
         </tr>
         <tr>
            <td>1.</td>
            <td><?php echo e($clientes->desc_video ?? ''); ?> </td>
            <td>
               <form action="<?php echo e(URL::to('admin/deletevideo')); ?>" method="POST" >
                  <input type="hidden" value="<?php echo e(csrf_token()); ?>" name="_token">
                  <input type="hidden" value="<?php echo e($clientes->id_video ?? ''); ?>" name="id_video">
                  <input type="hidden" value="<?php echo e($clientes->Id_escort ?? ''); ?>" name="escort_id">
                  <input type="hidden" value="<?php echo e($clientes->desc_video ?? ''); ?>" name="descripcion_video">
                  <button type="submit" class="btn btn-danger" >Eliminar</button>
               </form>
            </td>
         </tr>
      </table>
   </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/clientes/video.blade.php ENDPATH**/ ?>