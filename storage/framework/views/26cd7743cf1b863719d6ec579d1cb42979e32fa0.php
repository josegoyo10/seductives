<section class="content-header">
   <h1 style="color:black">Perfil del Usuario </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
      <li><a href="#">Mis Datos</a></li>
      <li class="active">Actualizar mi Perfil</li>
   </ol>
</section>
<!-- Main content -->
<section class="content"> 
   <div class="row">
      <div class="col-md-3">
         <!-- Profile Image -->
         <div class="box box-primary">
            <div class="box-body box-profile"> 
               <img  id="upfile1"  class="profile-user-img img-responsive img-circle" src= "<?php echo e(url('uploads/escort_fotos/'.$data->foto_principal)); ?>"  
                  alt="User profile picture" style="cursor:pointer" onmouseover="this.src='images/upload.png'" 
                  onmouseout="this.src = '<?php echo e(url('uploads/escort_fotos/'.$data->foto_principal)); ?>'"/>
   
               <h3 class="profile-username"> <?php echo e(ucfirst(auth()->user()->name)); ?></h3>
               <div class="row justify-content-center">
                  <form  id="frmUpload" action ="<?php echo e(route('admin.update.perfil_foto')); ?>" method="POST" enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <input type="hidden"   id="escortID"  name="escortID" value="<?php echo e($data->id); ?>" />
                     <div class="form-group text-center">
                        <input type="file"   class="form-control-file" name="avatar" id="file1" 
                           style="font-size:13px;cursor:pointer;display:none;"  onchange="form.submit()">
                     </div>
                     <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-sm"  id="submit-btn" style="display: none;"></button>
                     </div>
                  </form>
               </div>
               <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                     <b>Seguidores</b> <a class="pull-right">0</a>
                  </li>
               </ul>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
         <!-- About Me Box -->
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Sobre Mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <strong><i class="fa fa-book margin-r-5"></i> Mis Servicios</strong>
               <p class="text-muted">
                  <?php echo e($data->descripcion_servicio); ?>

               </p>
               <hr>
               <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
               <p class="text-muted"><?php echo e($data->descripcion_region); ?>, <?php echo e($data->descripcion_comuna); ?></p>
               <hr>
            </div>
            <!-- /.box-body -->
         </div>
         <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
         <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#activity" data-toggle="tab">Actividad</a></li>
               <li><a href="#settings"     data-toggle="tab">Actualizar Mi Perfil</a></li>
               <li><a href="#mis_fotos"    data-toggle="tab">Actualizar Mis Fotos</a></li>
               <li><a href="#galleryfotos" data-toggle="tab">Galeria de Fotos</a></li>
               <li><a href="#uploadNews"   data-toggle="tab">Agregar Mis Noticias</a></li>
            </ul>
            <!--Tab Principal !-->
            <div class="tab-content">
               <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <br><br>
                  <div class="post">
                     <p class="comment-text" style="color:black"><strong>Comentarios:  </strong> 
                        <i class="fa fa-comments bg-yellow"></i>
                        <span class="label label-success" id="comentarioCount"><?php echo e($count); ?></span>
                     </p>
                     <ul>
                        <li>
                           <div class="alert alert-success" id="divMsjEliminar" style="display:none;">
                              <p>
                                 Comentario eliminado
                              </p>
                           </div>
                           <?php echo $__env->make('admin.escort_register.commentsDisplay', ['comments' => $comentarios, 
                           'escort_id' => $data->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <h4 style="color:black">Añadir Comentario:</h4>
                           <form method="POST" action="<?php echo e(route('comments.store' )); ?>">
                              <?php echo csrf_field(); ?>
                              <div class="form-group">
                                 <textarea class="form-control" name="body" rows="3"></textarea>
                                 <input type="hidden" name="escort_id" value="<?php echo e($data->id); ?>" />
                              </div>
                              <div class="form-group text-center"> 
                                 <input type="submit" class="btn btn-primary"  style="padding-top:10px"
                                    value="Añadir Comentario" />
                              </div>
                           </form>
                     
                        </li>
                       
                     </ul>
                  </div>
               </div>
               <!--fin tab numero 1 !-->
               <!-- /.tab-pane -->
               <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <ul class="timeline timeline-inverse">
                     <!-- timeline time label -->
                     <li class="time-label">
                        <span class="bg-red">
                        10 Feb. 2014
                        </span>
                     </li>
                     <!-- /.timeline-label -->
                     <!-- timeline item -->
                     <li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                           <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                           <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                           <div class="timeline-body">
                              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                              weebly ning heekya handango imeem plugg dopplr jibjab, movity
                              jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                              quora plaxo ideeli hulu weebly balihoo...
                           </div>
                           <div class="timeline-footer">
                              <a class="btn btn-primary btn-xs">Read more</a>
                              <a class="btn btn-danger btn-xs">Delete</a>
                           </div>
                        </div>
                     </li>
                     <!-- END timeline item -->
                     <!-- timeline item -->
                     <li>
                        <i class="fa fa-user bg-aqua"></i>
                        <div class="timeline-item">
                           <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                           <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                           </h3>
                        </div>
                     </li>
                     <!-- END timeline item -->
                     <!-- timeline item -->
                     <li>
                        <i class="fa fa-comments bg-yellow"></i>
                        <div class="timeline-item">
                           <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                           <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                           <div class="timeline-body">
                              Take me to your leader!
                              Switzerland is small and neutral!
                              We are more like Germany, ambitious and misunderstood!
                           </div>
                           <div class="timeline-footer">
                              <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                           </div>
                        </div>
                     </li>
                     <!-- END timeline item -->
                     <!-- timeline time label -->
                     <li class="time-label">
                        <span class="bg-green">
                        3 Jan. 2014
                        </span>
                     </li>
                     <!-- /.timeline-label -->
                     <!-- timeline item -->
                     <li>
                        <i class="fa fa-camera bg-purple"></i>
                        <div class="timeline-item">
                           <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                           <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                           <div class="timeline-body">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                              <img src="http://placehold.it/150x100" alt="..." class="margin">
                           </div>
                        </div>
                     </li>
                     <!-- END timeline item -->
                     <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                     </li>
                  </ul>
               </div>
               <?php if($errors->any()): ?>
               <div class="alert alert-danger">
                  <ul>
                     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li><?php echo e($error); ?></li>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </div>
               <?php endif; ?>
               <?php if(\Session::has('success')): ?>
               <div class="alert alert-success">
                  <ul>
                     <li><?php echo \Session::get('success'); ?></li>
                  </ul>
               </div>
               <?php endif; ?>

               <div class="alert alert-success alert-dismissible fade in" role="alert" id="ajax-alert" style="display:none;">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                     <strong> Perfil Actualizado Exitosamente...!!</strong>
                  </div>
               <!-- /.tab-pane --><!--Actualizar mi Perfil !-->
               <div class="tab-pane" id="settings">
                  <br>
                  <form class="form-horizontal" id="frm_dataEscort" method="POST">
                     <?php echo csrf_field(); ?>
                     <input type="hidden"   id="escort_id"  name="escort_id" value="<?php echo e($data->id); ?>" />
                     <input type="hidden" id="perfil_id"  name="perfil_id"  value="<?php echo e($data->id_perfil); ?>" />
                     <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="nombre_escort" name="nombre_escort" value="<?php echo e($data->nombres); ?>" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Apellido</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control"  id="apellido_escort" name="apellido_escort"  value="<?php echo e($data->apellidos); ?>" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Edad</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control"  id="edad_escort" name="edad_escort"  value="<?php echo e($data->edad); ?>" disabled>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Télefono</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control item" id="telefono_escort" name="telefono_escort" 
                              placeholder="Phone Number"  data-inputmask="'mask': '+56 9 99 99 99 99 '" value="<?php echo e($data->telefono); ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Comentario</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" id="comentario_escort" name="comentario_escort" rows="5" style="resize:none;" ><?php echo e($data->comentario_escort); ?></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Descripción Servicio</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" id="descripcion_servicio_escort" name="descripcion_servicio_escort" rows="5" style="resize:none;"><?php echo e($data->descripcion_servicio); ?></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Altura</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="altura_escort" name="altura_escort"
                              name="altura_escort" value="<?php echo e($data->altura); ?>" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Medidas</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="medida_escort" name="medida_escort" 
                              value="<?php echo e($data->medidas); ?>" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Hora Inicio</label>
                        <div class="row">
                           <div class="col-sm-5">
                              <div class="bootstrap-timepicker">
                                 <div class="input-group">
                                    <input type="text" class="form-control timepicker" id="horario_ini_escort" name="horario_ini_escort" value="<?php echo e($data->hora_inicio); ?>"> 
                                    <div class="input-group-addon">
                                       <i class="fa fa-clock-o"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Hora Fin</label>
                        <div class="row">
                           <div class="col-sm-5">
                              <div class="bootstrap-timepicker">
                                 <div class="input-group">
                                    <input type="text" class="form-control timepicker" id="horario_fin_escort" name="horario_fin_escort" value="<?php echo e($data->hora_fin); ?>">
                                    <div class="input-group-addon">
                                       <i class="fa fa-clock-o"></i>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Atención</label>
                        <div class="col-sm-10">
                           <select class="form-control" 
                              style="width: 100%;" name="atencion_escort" id="atencion_escort">
                              <option  value="0">«« SELECCIONE »»</option>
                              <option  value="Depto Propio" <?php echo $data->atencion == 'Depto Propio' ? 'selected' : ''; ?>>Depto Propio</option>
                              <option  value="Domicilio"    <?php echo $data->atencion == 'Domicilio' ? 'selected' : ''; ?>>Domicilio</option>
                              <option  value="Hoteles"      <?php echo $data->atencion == 'Hoteles' ? 'selected' : ''; ?>>Hoteles</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Días Disponibles</label>
                        <div class="col-sm-10">
                           <select class="form-control" 
                              data-placeholder="Seleccione"
                              style="width: 100%;" name="dias_disponible" id="dias_disponible">
                              <option  value="0">«« SELECCIONE »»</option>
                              <option  value="Lunes a Domingo" <?php echo $data->dias_disponibles == 'Lunes a Domingo' ? 'selected' : ''; ?>>Lunes a Domingo</option>
                              <option  value="Lunes a Viernes" <?php echo $data->dias_disponibles == 'Lunes a Viernes' ? 'selected' : ''; ?>>Lunes a Viernes</option>
                              <option  value="Lunes a Sabado"  <?php echo $data->dias_disponibles == 'Lunes a Sabado' ? 'selected' : ''; ?>>Lunes a Sabado</option>
                              <option  value="Viernes a Domingo" <?php echo $data->dias_disponibles == 'Viernes a Domingo' ? 'selected' : ''; ?>>Viernes a Domingo</option>
                              <option  value="Viernes a Sabado" <?php echo $data->dias_disponibles == 'Viernes a Sabado' ? 'selected' : ''; ?>>Viernes a Sabado</option>
                              <option  value="Sabado a Domingo" <?php echo $data->dias_disponibles == 'Sabado a Domingo' ? 'selected' : ''; ?>>Sabado a Domingo</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Región</label>
                        <div class="col-sm-10">
                           <select name="region_escort" id="region_escort" class="form-control">
                              <option value="">«« SELECCIONE UNA REGION »»</option>
                              <?php $__currentLoopData = $regiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($region->id); ?>" 
                              <?php echo e($data->region == $region->id ? 'selected' : ''); ?>

                              ><?php echo e($region->nombre); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Comuna</label>
                        <div class="col-sm-10">
                           <select name="comuna_escort" id="comuna_escort" class="form-control">
                              <option value="<?php echo e($sql_desc_comuna->id); ?>"  selected ><?php echo e($sql_desc_comuna->nombre); ?>

                              </option>
                           </select>
                        </div>
                     </div>
               
                      <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Precio</label>
                        <div class="col-sm-10" style="text-align:left;">
                           <input type="text" class="form-control" id="precio_escort" 
                              name="precio_escort" value="<?php echo e($data->precio); ?>" maxlength="10" style="text-align:left;" 
                               value="<?php echo e($data->precio); ?>">
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Categorias</label>
                         <div class="col-sm-10">
                           <select name="categoria_escort" id="categoria_escort" class="form-control">
                            <option value="">«« SELECCIONE UNA CATEGORIA »»</option>
                              <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($categoria->id); ?>" 
                              <?php echo e($data->categoria_escort == $categoria->id ? 'selected' : ''); ?>

                              ><?php echo e($categoria->nombre); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputSkills" class="col-sm-2 control-label">Color de Piel</label>
                          <div class="col-sm-10">
                             <select class="form-control" 
                              data-placeholder="Seleccione"
                              style="width: 100%;" name="color_piel" id="color_piel">
                              <option  value="0">«« SELECCIONE »»</option>
                              <option  value="Triguena" <?php echo $data->color_piel == 'Triguena' ? 'selected' : ''; ?>>Trigueña</option>
                              <option  value="Blanca" <?php echo $data->color_piel == 'Blanca' ? 'selected' : ''; ?>>Blanca</option>
                              <option  value="Morena"  <?php echo $data->color_piel == 'Morena' ? 'selected' : ''; ?>>Morena</option>
                              <option  value="Negra" <?php echo $data->color_piel == 'Negra' ? 'selected' : ''; ?>>Negra</option>
     
                           </select>
                          </div>
                       </div>

                       <div class="form-group">
                          <label for="inputSkills" class="col-sm-2 control-label">Color de Cabello</label>
                          <div class="col-sm-10">
                             <select class="form-control" 
                              data-placeholder="Seleccione"
                              style="width: 100%;" name="color_cabello" id="color_cabello">
                              <option  value="0">«« SELECCIONE »»</option>
                              <option  value="Negro" <?php echo $data->color_cabello == 'Negro' ? 'selected' : ''; ?>>Negro</option>
                              <option  value="Rubia" <?php echo $data->color_cabello == 'Rubia' ? 'selected' : ''; ?>>Rubia</option>
                              <option  value="Peliroja"  <?php echo $data->color_cabello == 'Peliroja' ? 'selected' : ''; ?>>Peliroja</option>
                              <option  value="Castano" <?php echo $data->color_cabello == 'Castano' ? 'selected' : ''; ?>>Castaño</option>
     
                           </select>
                          </div>
                       </div>

                       <div class="form-group">
                          <label for="inputSkills" class="col-sm-2 control-label">Caracteristicas Fisicas</label>
                          <div class="col-sm-10">
                             <select class="form-control" 
                              data-placeholder="Seleccione"
                              style="width: 100%;" name="caracteristica_fisicas" id="caracteristica_fisicas">
                              <option  value="0">«« SELECCIONE »»</option>
                              <option  value="Delgada" <?php echo $data->caracteristica_fisicas == 'Delgada' ? 'selected' : ''; ?>>Delgada</option>
                              <option  value="Normal" <?php echo $data->caracteristica_fisicas == 'Normal' ? 'selected' : ''; ?>>Normal</option>
                              <option  value="Rellena"  <?php echo $data->caracteristica_fisicas == 'Rellena' ? 'selected' : ''; ?>>Rellena</option>
                              <option  value="Tetona" <?php echo $data->caracteristica_fisicas == 'Tetona' ? 'selected' : ''; ?>>Tetona</option>
                              <option  value="Culona" <?php echo $data->caracteristica_fisicas == 'Culona' ? 'selected' : ''; ?>>Culona</option>
     
                           </select>
                          </div>
                       </div>

                     <?php if(!empty($data_tipoServicios)): ?>
                           <?php $__currentLoopData = $data_tipoServicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                 $servicios_escort[] = $object->id_tipo_servicio;
                                 
                           ?>
                       
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                         <?php else: ?>
                          <?php
                            $servicios_escort[] = array("0");
                         ?>
                     <?php endif; ?>
                      
            
                       <div class="form-group">
                          <label for="inputSkills" class="col-sm-2 control-label">Tipo de Servicios</label>
                             <div class="col-sm-10">
                                 <?php if(!empty($servicios_escort)): ?>
                               
                                       <?php $__currentLoopData = $tipo_servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <label class="checkbox-inline">
                                             <input type="checkbox" value="<?php echo e($value->id); ?>" 
                                             name="tipo_servicios[]" 
                                          <?php echo e(in_array($value->id, $servicios_escort) ?  'checked' : ''); ?>

                                          ><span style="color:black"><?php echo ucwords($value->nombre_servicio); ?></span>
                                       </label>
                                 
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php else: ?>
                                      <?php $__currentLoopData = $tipo_servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <label class="checkbox-inline">
                                             <input type="checkbox" value="<?php echo e($value->id); ?>" 
                                             name="tipo_servicios[]" 
                                              ><?php echo ucwords($value->nombre_servicio); ?>

                                       </label>
                                 
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                            </div>
                       </div>


                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" class="btn btn-primary" id="btn_actualizar">Actualizar</button>
                        </div>
                     </div>
                  </form>
                  <div class="row margin-bottom">
                     <!-- /.col -->
                     <!--div class="col-sm-12"!-->
                     <div class="row">
                 
                        <div class="row">
                           <?php if($sql_foto_escort != ''): ?>
                           <div class="col-md-11" style="margin-left:15px;">
                              <div class="box box-primary">
                                 <div class="box-body">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <?php $__currentLoopData = $sql_foto_escort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <form  method="POST" action ="<?php echo e(route('admin.photos.destroy',$foto->url_fotos)); ?>">
                                             <?php echo e(method_field('DELETE')); ?> <?php echo e(csrf_field()); ?>

                                             <div class="col-md-2">
                                                <button class="btn btn-danger btn-xs" style="position:absolute">
                                                <i class="fa fa-remove"></i>
                                                </button>
                                                <img class="img-responsive" 
                                                   src="/uploads_escorts/<?php echo e($foto->url_fotos); ?>" style="margin-bottom:10px;" >
                                             </div>
                                          </form>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.tab-pane -->
               <div class="tab-pane" id="mis_fotos">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-8">
                           <div class="panel panel-primary">
                              <div class="panel-heading">
                                 Mis Fotos
                              </div>
                              <div class="panel-body">
                                 <form class="dropzone" id="my-dropzone" 
                                    action=" <?php echo e(route('files.store')); ?>"  
                                    enctype="multipart/form-data" method="POST" onsubmit="return subirFotos()">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" id="id_escort"  name="id_escort"  value="<?php echo e($data->id); ?>" />
                                    <input type="hidden" id="id_perfil"  name="id_perfil"  value="<?php echo e($data->id_perfil); ?>" />
                                    <div class="dz-message" style="height:200px;">
                                       Arrastras tus fotos hasta aqui
                                    </div>
                                    <div class="dropzone-previews"></div>
                                    <button type="text"   class="btn btn-primary"  
                                       id="submit">Subir</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <hr>
                     </div>
                  </div>
               </div>
               <!--fin tab mis fotos !-->
               <!--Tab Galeria de Fotos !-->
               <div class="tab-pane" id="galleryfotos">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="panel panel-primary" style="heigth:30px">
                              <div class="panel-heading">
                                 Mis Fotos
                              </div>
                              <div class="panel-body">
                                 <?php if($sql_foto_escort != ''): ?> 
                                 <div class="albumize" title="Album title" style="overflow: hidden;">
                                    <div class="container">
                                       <div class="row">
                                          <?php $__currentLoopData = $sql_foto_escort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <div class="col-md-2">
                                             <div class="thumbnail">
                                                <a href = "/uploads_escorts/<?php echo e($foto->url_fotos); ?>" title="image title"> 
                                                <img src="/uploads_escorts/<?php echo e($foto->url_fotos); ?>" 
                                                   style="height:130px;width: 70%;"></img>
                                                </a>
                                             </div>
                                          </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </div>
                                    </div>
                                 </div>
                                 <?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--Tab News !-->
               <div class="tab-pane" id="uploadNews">
                  <div><?php echo e($errors->first('cantidad_news')); ?></div>
                  <br><br>
                  <form class="form-horizontal" action="<?php echo e(route('admin.addnews.store')); ?>" method="POST">
                     <?php echo csrf_field(); ?>
                     <input type="hidden"    id="escort_id"  name="escort_id" value="<?php echo e($data->id); ?>" />
                     <input type="hidden"      id="perfil_id"  name="perfil_id"  value="<?php echo e($data->id_perfil); ?>" />
                     <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label" style="color:black">Agregar Noticia:</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" id="add_news_escort" name="add_news_escort" rows="5" style="resize:none;"></textarea>
                        </div>
                     </div>
                     <div class="text-center">
                          <button type="submit"  class="btn btn-primary text-center">Subir</button>
                     </div>
                  </form>
               </div>
            </div>
            <!--------UPLOAD VIDEO !-->
            <!-- /.tab-content -->
         </div>
         <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
   </div>
   </div>
   <!-- /.row -->
</section><?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/clientes/acciones_escort.blade.php ENDPATH**/ ?>