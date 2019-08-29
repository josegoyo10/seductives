<ul class="sidebar-menu" data-widget="tree">
   <li class="header">Navegación</li>
   <li class="active"><a href="#"><i class="fa fa-home"></i><span>Inicio</span></a></li>

   <li class="treeview">
      <a href="#">
      <i class="fa fa-dashboard"></i> <span>Perfil</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <?php if(auth()->user()->hasRole('Admin')): ?>
              <li class="active"><a href="<?php echo e(url('admin')); ?>">
                    <i class="fa fa-eye"></i> Ver todas las Clientas</a>
              </li>
         <?php else: ?>

           <?php if(Auth::user()->id_tipo_usuario == 1): ?> <!--Escorts !-->

             <li>
                 <a href="<?php echo e(url('admin')); ?>"><i class="fa fa-pencil"></i> Ver Mi Perfil</a>
              </li>

              <li>
                 <a href="<?php echo e(route('admin.clientes.video')); ?>"><i class="fa fa-file-video-o"></i> Subir Video</a>
              </li>
             
             
              <li>
                 <a href="<?php echo e(route('admin.follow.friendship')); ?>"><i class="fa fa-user-o"></i> Solicitud de Amistad</a>
              </li>
           
           
            <?php else: ?>
              <li>
                 <a href="<?php echo e(url('admin')); ?>"><i class="fa fa-pencil"></i> Ver Escorts</a>
              </li>

              <li>
                 <a href="<?php echo e(route('admin.calificar.escort')); ?>"><i class="fa fa-gratipay"></i> Calificar Escort</a>
              </li>

            <?php endif; ?>
          <?php endif; ?>

      </ul>
   </li>

</ul>

<?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/partials/nav.blade.php ENDPATH**/ ?>