<!DOCTYPE html>
<html>
   <head>
      <title>Seductives | Registro Escort</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" href="img/favicon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/css/icon.css">
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="/css/icon.css">
      <link rel="stylesheet" href="/css/loader.css">
      <link rel="stylesheet" href="/css/idangerous.swiper.css">
      <link rel="stylesheet" href="/css/jquery-ui.css">
      <link rel="stylesheet" href="/css/stylesheet.css">
      <!--Fontawesome CDN-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <link rel="stylesheet"
         href='{{ url("assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}'>
      <!-- Select2 -->
      <link rel="stylesheet" href='{{ url("assets/bower_components/select2/dist/css/select2.min.css") }}'>
      <!---dropzone css !-->
      <link rel="stylesheet" type="text/css" href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css'>
      <style type="text/css">
         input[type=file]{
         display: inline;
         }
         #image_preview{
         border: 1px solid #ccc;
         padding: 10px;
         }
         #image_preview img{
         width: 200px;
         padding: 5px;
         }
      </style>
   <body>
      <!-- THE LOADER -->
      <div class="be-loader">
         <div class="spinner">
            <img src="img/logo-loader.png"  alt="">
            <p class="circle">
               <span class="ouro">
               <span class="left"><span class="anim"></span></span>
               <span class="right"><span class="anim"></span></span>
               </span>
            </p>
         </div>
      </div>
      <!-- THE HEADER -->
      <header>
         <div class="container-fluid custom-container">
            <div class="row no_row row-header">
               <div class="brand-be">
                  <a href="index.html">
                  <img class=" be_logo logo-c active"  src="img/logo.png" alt="logo" >
                  <img class="logo-c be_logo" src="img/logo-green.png" alt="logo" >
                  <img  class="logo-c be_logo" src="img/logo-orang.png" alt="logo" >
                  <img class="logo-c be_logo" src="img/logo-red.png" alt="logo">
                  </a>
               </div>
               <div class="header-menu-block"></div>
               <div class="login-header-block">
                  <div class="login_block">
                     <a class="btn btn-primary"
                        href="{{ url('/') }}">Inicio</a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- MAIN CONTENT -->
      <div id="content-block">
         <div class="container be-detail-container">
            <h3 class="content-title">Formulario de Registro</h3>
            <div class="blog-wrapper blog-list blog-fullwith">
               <div class="row">
                  <div class="col-xs-12 col-md-10 col-md-offset-1">
                     <div class="blog-post be-large-post type-2">
                        <div class="info-block clearfix"></div>
                        <div class="be-large-post-align blog-content">
                           <div class="be-text-tags clearfix custom-a-b">
                              <div class="post-date">
                                 <i class="fa fa-clock-o"></i> {{ $fecha }}
                              </div>
                              <div class="author-post">
                                 <img src="img/a1.png" alt="" class="ava-author">
                                 <span>by <a href="blog-detail-2.html">Seductives</a></span>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="box box-primary">
                                    <div class="box-body">
                                       <div class="row">
                                          @if (count($errors) > 0)
                                          <div class="alert alert-danger">
                                             <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                             <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                             </ul>
                                          </div>
                                          @endif
                                          @if(session('success'))
                                          <div class="alert alert-success">
                                             {{ session('success') }}
                                          </div>
                                          @endif
                                          <form  method="POST" action="{{url('create_escort')}}"  enctype="multipart/form-data">
                                             {{ csrf_field() }}
                                             <div class='row'>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="rut" class="col-form-label">Run:</label>
                                                      <input type="text" class="form-control" id="rut" name="rut" maxlength="11" value="{{ old('rut') }}">
                                                      <span class="text-danger">
                                                      <strong id="rut-error"></strong>
                                                      </span>
                                                   </div>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="nombres" class="col-form-label">Nombres:</label>
                                                      <input type="text" class="form-control" id="nombres" name="nombres" maxlength="20" value="{{ old('nombres') }}">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="nombres-error"></strong>
                                                   </span>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="apellidos" class="col-form-label">Apellidos:</label>
                                                      <input type="text" class="form-control" id="apellidos" name="apellidos"  maxlength="20" value="{{ old('apellidos') }}">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="apellidos-error"></strong>
                                                   </span>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row">
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="apellidos" class="col-form-label">Email:</label>
                                                      <input type="text" class="form-control" id="email" name="email"  maxlength="50" value="{{ old('email') }}">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="email-error"></strong>
                                                   </span>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label>Fecha de Nacimiento:</label>
                                                      <div class="input-group date">
                                                         <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                         </div>
														 <input type="text"  name="fecha_nacimiento" class="form-control pull-right" id="datepicker">
                                                      </div>
                                                      <span class="text-danger">
                                                      <strong id="fecha_nacimiento-error"></strong>
                                                      </span>
                                                   </div>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class="form-group">
                                                      <label for="exampleFormControlSelect1">Nacionalidad</label>
                                                      <select class="form-control" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad') }}">
                                                         <option value="0">«« SELECCIONE »»</option>
                                                         <option value="argentina">Argentina</option>
                                                         <option value="colombia">Colombia</option>
                                                         <option value="chile">Chile</option>
                                                         <option value="ecuador">Ecuador</option>
                                                         <option value="peru">Peru</option>
                                                         <option value="venezuela">Venezuela</option>
                                                      </select>
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="nacionalidad-error"></strong>
                                                   </span>
                                                </div>
                                             </div>
                                             <!-- <h5>PERFIL ESCORT</h5>
                                             <hr style="background-color: #fff;border-top: 2px dotted #8c8b8b;"> -->
                                             <div class='row'>
                                                <div class='col-md-8'>
                                                   <div class='form-group'>
                                                      <label for="exampleFormControlSelect1">Region</label>
                                                      <select id="regiones" class="form-control" name="regiones"></select>
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="regiones-error"></strong>
                                                   </span>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="nombres" class="col-form-label">Comuna</label>
                                                      <select id="comunas" class="form-control" name="comunas"></select>
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="comunas-error"></strong>
                                                   </span>
                                                </div>
                                             </div>
                                             <div class='row'>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="edad" class="col-form-label">Edad:</label>
                                                      <input type="text" class="form-control" id="edad" name="edad"
                                                         onkeypress="return isNumber(event)" maxlength="5" value="{{ old('edad') }}" disabled >
												   </div>
												    <input type="hidden" id="edad_cliente" name="edad_cliente" />
                                                   <span class="text-danger">
                                                   <strong id="edad-error"></strong>
                                                   </span>
                                                </div>
												<div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="Sexo" class="col-form-label">Sexo:</label>
                                                      <select class="form-control" id="sexo" name="sexo" value="{{ old('sexo') }}">
                                                         <option value="0">«« SELECCIONE »»</option>
                                                         <option value="1">Femenino</option>
                                                         <option value="2">Masculino</option>
                                                      </select>
                                                      <span class="text-danger">
                                                      <strong id="sexo-error"></strong>
                                                      </span>
                                                   </div>
												</div>
												 <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="rut" class="col-form-label">Teléfono:</label>
                                                      <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" maxlength="12">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="telefono-error"></strong>
                                                   </span>
												 </div>
											   </div>
                                                <!-- <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="altura" class="col-form-label">Altura:</label>
                                                      <input type="text" class="form-control" id="altura"
                                                         name="altura" maxlength="8" value="{{ old('altura') }}">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="altura-error"></strong>
                                                   </span>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="medidas" class="col-form-label">Medidas:</label>
                                                      <input type="text" class="form-control" id="medidas" name="medidas" maxlength="10" value="{{ old('medidas') }}">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="medidas-error"></strong>
                                                   </span>
                                                </div> -->
                                             <!--/div>
                                             <div class="row">
                                                 <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="nombres" class="col-form-label">Horario:</label>
                                                      <input type="text" class="form-control" id="horario" name="horario" value="{{ old('horario') }}" maxlength="20">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="horario-error"></strong>
                                                   </span>
                                                </div> -->
                                                <!-- <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="apellidos" class="col-form-label">Dias de Atención:</label>
                                                      <input type="text" class="form-control" id="atencion" name="atencion"  value="{{ old('atencion') }}">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="atencion-error"></strong>
                                                   </span>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="rut" class="col-form-label">Teléfono:</label>
                                                      <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" maxlength="12">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="telefono-error"></strong>
                                                   </span>
                                                </div>
                                             </div> -->
                                             <!--div class='row'>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="precio" class="col-form-label">Precio:</label>
                                                      <input type="text" class="form-control" id="precio" name="precio" onkeyup="checkDec(this);"
                                                         value="{{ old('precio') }}" maxlength="10">
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="precio-error"></strong>
                                                   </span>
                                                </div> -->
                                                <!-- <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="apellidos" class="col-form-label">Categoria:</label>
                                                      <select class="form-control" id="categoria" name="categoria"   value="{{ old('categoria') }}">
                                                         <option value="0">«« SELECCIONE »»</option>
                                                         <option value="escorts">Escorts</option>
                                                         <option value="trans">Trans y Travestis</option>
                                                         <option value="masajes">Masajes</option>
                                                         <option value="gays">Gays</option>
                                                         <option value="madura">Madura</option>
                                                         <option value="swingers">Swingers</option>
                                                      </select>
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="categoria-error"></strong>
                                                   </span>
                                                </div> -->
                                                <!-- <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="Sexo" class="col-form-label">Sexo:</label>
                                                      <select class="form-control" id="sexo" name="sexo" value="{{ old('sexo') }}">
                                                         <option value="0">«« SELECCIONE »»</option>
                                                         <option value="1">Femenino</option>
                                                         <option value="2">Masculino</option>
                                                      </select>
                                                      <span class="text-danger">
                                                      <strong id="sexo-error"></strong>
                                                      </span>
                                                   </div>
                                                </div> >
                                             </div-->
                                             <div class="row">
                                                <div class='col-md-12'>
                                                   <div class="form-group">
                                                      <label>Comentarios</label>
                                                      <textarea rows="5" name="comentario_escort" id="comentario_escort" class="form-control" autofocus>
                                                      </textarea>
                                                   </div>
                                                   <span class="text-danger">
                                                   <strong id="comentarios-error"></strong>
                                                   </span>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlFile1">Subir Foto Principal:</label>
                                                      <input type="file" class="form-control-file" name="photo_principal" id="photo_principal">
                                                   </div>
                                                   <div id="image_preview"></div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlFile1">Subir Foto Secundaria 1:</label>
                                                      <input type="file" class="form-control-file" name="photo_secundaria_1" id="photo_secundaria_1">
                                                   </div>
                                                   <div id="image_preview_1"></div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlFile1">Subir Foto Secundaria 2:</label>
                                                      <input type="file" class="form-control-file" name="photo_secundaria_2" id="photo_secundaria_2">
                                                   </div>
                                                   <div id="image_preview_2"></div>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row">
                                                <div class="col-md-12 text-center">
                                                   <button type="submit" class="btn btn-primary btn-md">Ingresar Registro</button>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!--fin be-large-post-align !-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- THE FOOTER -->
      <!-- SCRIPTS	 -->
      <script src="/js/jquery-2.1.4.min.js"></script>
      <script src="/js/jquery-ui.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/idangerous.swiper.min.js"></script>
      <script src="/js/jquery.mixitup.js"></script>
      <script src="/js/jquery.viewportchecker.min.js"></script>
      <script src="/js/filters.js"></script>
      <script src="/js/global.js"></script>
      <script src="/js/funciones/funciones.js"></script>
      <script src='{{ url("assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js") }}'></script>
      <!-- CK Editor -->
      <script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
      <!-- Select2 -->
      <script src='{{ url("assets/bower_components/select2/dist/js/select2.full.min.js") }}'></script>
      <!-- Dropzone -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js'></script>
      <!--File Input photos -->
      <script src="/js/fileinput.min.js" type="text/javascript"></script>
      <!--script src="/js/locales/es.js" type="text/javascript"></script!-->
      <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script!-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
      <!------------------------------------------------------------------------------------------!-->
      <script>
         // CKEDITOR.replace('editor');
         // CKEDITOR.config.height = 175;
         
         //Date picker
         $('#datepicker').datepicker({
        		 autoclose: true
         });
         

         $("#photo_principal").change(function(){
         
        	 $('#image_preview').html("");
         
         		var total_file=document.getElementById("photo_principal").files.length;
         
				for(var i=0;i<total_file;i++)
			
				{
			
					$('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
			
				}
         
         });
         
         $("#photo_secundaria_1").change(function(){
         
        	 $('#image_preview_1').html("");
         
				var total_file=document.getElementById("photo_secundaria_1").files.length;
			
				for(var i=0;i<total_file;i++)
				
					{
				
					$('#image_preview_1').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
				
					}
         
          });
         
         
         $("#photo_secundaria_2").change(function(){
         
        	 $('#image_preview_2').html("");
         
         		var total_file=document.getElementById("photo_secundaria_2").files.length;
         
				for(var i=0;i<total_file;i++)
				
				{
				
				$('#image_preview_2').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
				
				}
         
          });
         
        //calcular edad del cliente.
		$("#datepicker").change(function(){
			$('input[name="edad_cliente"]').val(' ');
		   // alert('xx');
				var today = new Date();
				var birthDate = new Date($('#datepicker').val());
				var age = today.getFullYear() - birthDate.getFullYear();
				var m = today.getMonth() - birthDate.getMonth();
				if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
					age--;
				}

				$('input[name="edad_cliente"]').val(age);
				return $('input[name="edad"]').val(age + ' ' + 'años');
			
		});

         




         //Guardar formulario
         
         $('body').on('click', '#btn_guardar', function(e){
         event.preventDefault();
         
         var registerForm = $("#formRegistro_escort");
         var formData = registerForm.serialize();
         // var data = CKEDITOR.instances.editor1.getData();
         // $( '#name-error' ).html( "" );
         // $( '#last_name-error' ).html( "" );
         // $( '#email-error' ).html( "" );
         // $( '#password-error' ).html( "" );
         
         $.ajax({
         url:'/create_escort',
         type:'POST',
         data:formData,
         success:function(data) {
         console.log(data);
         if(data.errors) {
			if(data.errors.name){
			$( '#name-error' ).html( data.errors.name[0] );
			}
         
         if(data.errors.last_name){
			$( '#last_name-error' ).html( data.errors.last_name[0] );
			}
         
         if(data.errors.email){
         	$( '#email-error' ).html( data.errors.email[0] );
         	}
         
         
         if(data.errors.password){
        	 $( '#password-error' ).html( data.errors.password[0] );
         }
         
         }
         if(data.success) {
         	$('#success-msg').removeClass('hide');
				setInterval(function(){
					$('#SignUp').modal('hide');
					$('#success-msg').addClass('hide');
				}, 4000);
				}
         	},
         	});
         
         });
         
         
         
         
      </script>
   </body>
</html>