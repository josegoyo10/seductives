<div class="box">
            <div class="box-header">
               <h3 class="box-title">Listado de todos los Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="cliente-table" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Run</th>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Fecha Nacimiento</th>
                        <th>Nacionalidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td><?php echo e($cliente->rut); ?></td>
                        <td><?php echo e($cliente->nombres); ?> <?php echo e($cliente->apellidos); ?> </td>
                        <td><?php echo e($cliente->email); ?></td>
                        <td><?php echo e($cliente->fecha_nacimiento); ?></td>
                        <td><?php echo e($cliente->nacionalidad); ?></td>
                        <td><?php echo $cliente->descripcion_estado; ?></td>
                        <td> 
                           <a href="<?php echo e(route('admin.clientes.info',$cliente->id)); ?>" class="btn btn-primary">Ver</a>
                        </td>
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div><?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/partials/admin_user.blade.php ENDPATH**/ ?>