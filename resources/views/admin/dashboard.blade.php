@extends('admin.layout')

<link rel="stylesheet" href='{{ url("adminlte/bower_components/select2/dist/css/select2.min.css") }}'>

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>Perfil del Usuario </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">User profile</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-3">
         <!-- Profile Image -->
         <div class="box box-primary">
            <div class="box-body box-profile">
               <img class="profile-user-img img-responsive img-circle" src="{{ $data->foto_principal }}" alt="User profile picture">
               <h3 class="profile-username text-center"> {{ auth()->user()->name }}</h3>
               <p class="text-muted text-center">Software Engineer</p>
               <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                     <b>Seguidores</b> <a class="pull-right">1,322</a>
                  </li>
                  <!-- <li class="list-group-item">
                     <b>Following</b> <a class="pull-right">543</a>
                     </li>
                     <li class="list-group-item">
                     <b>Friends</b> <a class="pull-right">13,287</a>
                     </li> -->
               </ul>
               <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
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
                  {{ $data->descripcion_servicio }}
               </p>
               <hr>
               <strong><i class="fa fa-map-marker margin-r-5"></i> Ubicación</strong>
               <p class="text-muted">{{ $data->descripcion_region }}, {{ $data->descripcion_comuna }}</p>
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
               <li class="active"><a href="#activity" data-toggle="tab">Mis Datos</a></li>
               <li><a href="#settings" data-toggle="tab">Actualizar Mi Perfil</a></li>
            </ul>
            <div class="tab-content">
               <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">
                     <form class="form-horizontal">
                        <div class="form-group">
                           <label for="inputName" class="col-sm-2 control-label">Nombre</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName" value="{{$data->nombres}}" disabled>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputName" class="col-sm-2 control-label">Apellido</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName"  value="{{$data->apellidos}}" disabled>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputEmail" class="col-sm-2 control-label">Télefono</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputEmail" value="{{$data->telefono}}" disabled>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputExperience" class="col-sm-2 control-label">Descripción Servicio</label>
                           <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" disabled>{{ $data->descripcion_servicio }}</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputSkills" class="col-sm-2 control-label">Altura</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" value="{{$data->altura}}" disabled>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputSkills" class="col-sm-2 control-label">Medidas</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" value="{{$data->medidas}}" disabled>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputSkills" class="col-sm-2 control-label">Horario</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" value="{{ $data->horario }}" disabled>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputSkills" class="col-sm-2 control-label">Atención</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" value="{{ $data->atencion }}" disabled>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputSkills" class="col-sm-2 control-label">Precio</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" value="{{ $data->precio }}" disabled>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- /.post -->
                  <!-- Post -->
                  <div class="post">
                     <div class="user-block">
                        <span class="username">
                        <a href="#">Mis Fotos</a>
                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                     </div>
                     <!-- /.user-block -->
                     <div class="row margin-bottom">
                        <!-- /.col -->
                        <div class="col-sm-12">
                           <div class="row">
                              <div class="col-sm-3">
                                 <a href="{{ $data->foto_principal }}" class="img-responsive" data-toggle="lightbox" data-gallery="example-gallery"  class="col-sm-4">
                                 <img src="{{ $data->foto_principal }}" class="img-fluid" style="width:120px">
                                 </a>
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-3">
                                 <a href="{{ $data->foto_secundaria_1 }}" class="img-responsive" data-toggle="lightbox" data-gallery="example-gallery"  class="col-sm-4">
                                 <img src="{{ $data->foto_secundaria_1 }}" class="img-fluid" style="width:120px">
                                 </a>
                              </div>
                              <div class="col-sm-3">
                                 <a href="{{ $data->foto_secundaria_2 }}" class="img-responsive" data-toggle="lightbox" data-gallery="example-gallery"  class="col-sm-4">
                                 <img src="{{ $data->foto_secundaria_2 }}" class="img-fluid" style="width:120px">
                                 </a>
                              </div>
                              @if ($sql_foto_escort != '')
                              <div class="row">
                                 @foreach ($sql_foto_escort as $foto)
                                 <a href="/uploads_escorts/{{$foto->url_fotos}}" 
                                    data-toggle="lightbox" data-gallery="example-gallery" >
                                 <img src="/uploads_escorts/{{$foto->url_fotos}}" class="img-fluid" style="width:120px">
                                 </a>
                                 @endforeach
                              </div>
                              @endif 
                              <!-- /.col -->
                           </div>
                           <!-- /.row -->
                        </div>
                        <!-- /.col -->
                     </div>
                     <!-- /.row -->
                  </div>
                  <!-- /.post -->
               </div>
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
               <!-- /.tab-pane --><!--Actualizar mi Perfil !-->
               <div class="tab-pane" id="settings">
                  <div class="alert alert-success alert-dismissible fade in" role="alert" id="ajax-alert" style="display:none;">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">×</span>
                     </button>
                     <strong> Perfil Actualizado Exitosamente...!!</strong>
                  </div>
                  <form class="form-horizontal" id="frm_dataEscort" method="POST">
                      <input type="hidden"   id="escort_id"  name="escort_id" value="{{ $data->id}}" />
                      <input type="hidden" id="perfil_id"  name="perfil_id"  value="{{ $data->id_perfil}}" />
                     <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="nombre_escort" name="nombre_escort" value="{{$data->nombres}}" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Apellido</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control"  id="apellido_escort" name="apellido_escort"  value="{{$data->apellidos}}" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Télefono</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control item" id="telefono_escort" name="telefono_escort" 
                        placeholder="Phone Number"  data-inputmask="'mask': '+56 9 99 99 99 99 '" value="{{$data->telefono}}">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Comentario</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" id="comentario_escort" name="comentario_escort" >{{ $data->comentario_escort }}</textarea>
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Descripción Servicio</label>
                        <div class="col-sm-10">
                           <textarea class="form-control" id="descripcion_servicio_escort" name="descripcion_servicio_escort"  >{{ $data->descripcion_servicio }}</textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Altura</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="altura_escort" maxlength="4" name="altura_escort" value="{{$data->altura}}" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Medidas</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="medida_escort" name="medida_escort" maxlength="7" value="{{$data->medidas}}" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Horario</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="horario_escort" name="horario_escort" value="{{ $data->horario }}" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Dias de Atención</label>
                        <div class="col-sm-10">
                           <select class="form-control select2" multiple="multiple" 
                             data-placeholder="Seleccione"
                                    style="width: 100%;" name="dias_atencion[]">
                              <option  value="Lunes.">Lunes</option>
                              <option  value="Martes.">Martes</option>
                              <option  value="Miercoles.">Miercoles</option>
                              <option  value="Jueves.">Jueves</option>
                              <option  value="Viernes.">Viernes</option>
                              <option  value="Sabado.">Sabado</option>
                              <option  value="Domingo.">Domingo</option>
                           </select>
                           <!--input type="text" class="form-control" id="atencion_escort" name="atencion_escort" value="{{ $data->atencion }}" !-->
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Precio</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" id="precio_escort" 
                           name="precio_escort" value="{{ $data->precio }}" maxlength="10"
                           data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'" style="text-align: left;" >
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
         </div>
         <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
</section>
<!-- /.content -->
</div>
@stop

<script src="/js/jquery-2.1.4.min.js"></script>
<script src='{{url("adminlte/bower_components/select2/dist/js/select2.full.min.js") }}'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>


<script>
 $j=jQuery.noConflict();

  $j(document).ready(function () {
    // Initialize InputMask
    
     $j("#telefono_escort").inputmask('9999-999-9999');
     $j('#horario_escort').inputmask("9{1,2}:99 aa - 9{1,2}:99 aa");
     $j('.select2').select2();
     $j("#precio_escort").inputmask({ alias : "pesos" })

  

   });

</script>