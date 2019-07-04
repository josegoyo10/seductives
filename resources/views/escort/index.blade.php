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
      <!-- daterange picker -->
      <link rel="stylesheet" href='{{ url("adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css") }}'>
      <!-- bootstrap datepicker -->
      <link rel="stylesheet" href='{{ url("adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") }}'>
      <!-- Bootstrap time Picker -->
      <link rel="stylesheet" href='{{ url("adminlte/plugins/timepicker/bootstrap-timepicker.min.css") }}'>
      <style type="text/css">
         /* input[type=file]{
         display: inline;
         } */
         #image_preview{
               border: 1px solid #ccc;
               padding: 10px;
         }
         #image_preview img{
               width: 200px;
               padding: 5px;
         }
      
      .error{
            color: red;
         }
      label,
      input
       {
         border: 0;
         margin-bottom: 3px;
         display: block;
         width: 100%;
      }
      .common_box_body {
         padding: 15px;
         border: 12px solid #28BAA2;
         border-color: #28BAA2;
         border-radius: 15px;
         margin-top: 10px;
         background: #d4edda;
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
                  <a href="{{ route('inicio') }}">
                  <img class=" be_logo logo-c active"  src="images/logo_header_seductives.jpg" style="display: block;max-width:20%;height: auto;" alt="logo" >
                  <img class="logo-c be_logo" src="img/logo-green.png" alt="logo" >
                  <img  class="logo-c be_logo" src="img/logo-orang.png" alt="logo" >
                  <img class="logo-c be_logo" src="img/logo-red.png" alt="logo">
                  </a>
               </div>
               <div class="header-menu-block"></div>
               <div class="login-header-block">
                  <div class="login_block">
                     <a  href="{{ route('inicio') }}" class="btn btn-primary btn-sm"
                       >Inicio</a>
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
                                             <strong style="color:#ff0000;">Error !!! Hay algunos problemas con los campos del formulario por favor todos
                                             los campos son requeridos. </strong><br><br>
                                             <ul>
                                                @foreach ($errors->all() as $error)
                                                <li style="color:#ff0000;">{{ $error }}</li>
                                                @endforeach
                                             </ul>
                                          </div>
                                          @endif
                                          @if(session('success'))
                                          <div class="alert alert-success">
                                             {{ session('success') }}
                                          </div>
                                          @endif
                                          <form  method="POST" action="{{url('create_escort')}}"  enctype="multipart/form-data" id="frmRegistro">
                                             {{ csrf_field() }}
                                             <div class='row'>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="rut" class="col-form-label">Run (*):</label>
                                                      <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}">
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="nombres" class="col-form-label">Nombres (*):</label>
                                                      <input type="text" class="form-control" id="nombres" name="nombres" maxlength="20" value="{{ old('nombres') }}">
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="apellidos" class="col-form-label">Apellidos (*):</label>
                                                      <input type="text" class="form-control" id="apellidos" name="apellidos"  maxlength="20" value="{{ old('apellidos') }}">
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row">
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="apellidos" class="col-form-label">Email(*):</label>
                                                      <input type="text" class="form-control" id="email" name="email"  maxlength="50" value="{{ old('email') }}">
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label>Fecha de Nacimiento (*):</label>
                                                       <div class="input-group date">
                                                         <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                         </div>
                                                         <input type="text"  name="fecha_nacimiento" class="form-control" id="datepicker">
                                                      </div>
                                                    
                                                   </div>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class="form-group">
                                                      <label for="exampleFormControlSelect1">Nacionalidad (*):</label>
                                                      <select class="form-control" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad') }}">
                                                         <option value="0">«« SELECCIONE »»</option>
                                                         <option value="argentina">Argentina</option>
                                                         <option value="colombia">Colombia</option>
                                                         <option value="chile">Chile</option>
                                                         <option value="ecuador">Ecuador</option>
                                                         <option value="peru">Peru</option>
                                                         <option value="venezuela">Venezuela</option>
                                                      </select>
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                </div>
                                             </div>
                                             <br>
                                             <!-- <h5>PERFIL ESCORT</h5>
                                                <hr style="background-color: #fff;border-top: 2px dotted #8c8b8b;"> -->
                                             <div class='row'>
                                                <div class='col-md-8'>
                                                   <div class='form-group'>
                                                      <label for="exampleFormControlSelect1">Region (*):</label>
                                                      <select id="regiones" class="form-control" name="regiones">
                                                         @foreach ($regiones as $region)
                                                         <option value="{{$region->id}}" 
                                                            >{{ $region->nombre }}</option>
                                                         @endforeach
                                                      </select>
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="nombres" class="col-form-label">Comuna (*):</label>
                                                      <select id="comunas" class="form-control" name="comunas"></select>
                                                   </div>
                                                   <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                </div>
                                             </div><br>
                                             <div class='row'>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="edad" class="col-form-label">Edad (*):</label>
                                                      <input type="text" class="form-control" id="edad" name="edad"
                                                         onkeypress="return isNumber(event)" maxlength="5" value="{{ old('edad') }}" disabled >
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                   <input type="hidden" id="edad_cliente" name="edad_cliente" />
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="Sexo" class="col-form-label">Sexo (*):</label>
                                                      <select class="form-control" id="sexo" name="sexo" value="{{ old('sexo') }}">
                                                         <option value="0">«« SELECCIONE »»</option>
                                                         <option value="1">Femenino</option>
                                                         <option value="2">Masculino</option>
                                                      </select>
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                      <!--span class="text-danger">
                                                      <strong id="sexo-error"></strong>
                                                      </span!-->
                                                   </div>
                                                </div>
                                                <div class='col-md-4'>
                                                   <div class='form-group'>
                                                      <label for="rut" class="col-form-label">Teléfono (*):</label>
                                                      <input type="text" class="form-control" id="telefono" name="telefono" 
                                                         value="{{ old('telefono') }}" data-inputmask="'mask': '+56 9 99 99 99 99 '">
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class='col-md-12'>
                                                   <div class="form-group">
                                                      <label>Comentarios (*):</label>
                                                      <textarea rows="5" name="comentario_escort" id="comentario_escort" class="form-control"></textarea>
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlFile1">Subir Foto Principal (*):</label>
                                                      <input type="file" class="form-control-file" name="photo_principal" id="photo_principal">
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                   <div id="image_preview" style="border: 0px solid;"></div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlFile1">Subir Foto Secundaria 1 (*):</label>
                                                      <input type="file" class="form-control-file" name="photo_secundaria_1" id="photo_secundaria_1">
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                   <div id="image_preview_1"></div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="form-group">
                                                      <label for="exampleFormControlFile1">Subir Foto Secundaria 2:</label>
                                                      <input type="file" class="form-control-file" name="photo_secundaria_2" id="photo_secundaria_2">
                                                      <!--span style="color:red;font-size:12px;">El campo es requerido </span!-->
                                                   </div>
                                                   <div id="image_preview_2"></div>
                                                </div>
                                             </div>
                                             <br>
                                             <div class="row">
                                                <div class="col-md-12 text-center">
                                                   <button type="submit" class="btn-login btn color-1 size-2 hover-2"
                                                      >Ingresar Registro</button>
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
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <!--File Input photos -->
      <script src="/js/fileinput.min.js" type="text/javascript"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <!--script src="/js/locales/es.js" type="text/javascript"></script!-->
      <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script!-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
      <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
      <!------------------------------------------------------------------------------------------!-->
      <script>
         $(document).ready(function () {
         
         
         
         $('#frmRegistro').validate({ // initialize the plugin
         rules: {
                 
                rut : {
                  required: true

                },
                  nombres: {
                    required: true
                 },
                  apellidos: {
                    required: true
                 },
                email: {
                    required: true,
                    email: true
                 },
                  telefono: {
                    required: true
                   
                 },
                   fecha_nacimiento: {
                      required: true,
                  
                 },
                  regiones: {
                    required: true,
                 },
                  comunas: {
                    required: true,
                   
                 },
                 edad: {
                    required: true,
             
                 },
                 sexo: {
                    required: true,
                 },
                 comentario_escort: {
                    required: true,
                 },
                 photo_principal: {
                    required: true,
                    extension: "jpeg|png"
                 },
                 photo_secundaria_1: {
                    required: true,
                    extension: "jpeg|png"
                 },
                 photo_secundaria_2: {
                    required: true,
                    extension: "jpeg|png"
                 },
                   
             },
            
               messages: {
                  rut: "Ingresa un run valido",
                  nombres: "El campo nombres es requerido",
                  apellidos: "El campo apellidos es requerido",
                  email: {
                         required: "El campo email es requerido",
                         email: "Ingrese un email valido.",
                      },
                      telefono: {
                        required: "El campo telefono es requerido",
                        digits: "Por favor ingrese un numero valido",
                     }, 
                 fecha_nacimiento : "El campo fecha de nacimiento es requerido",
                 regiones : "El campo región es requerido",
                 comunas : "El campo región es requerido",
                 edad : "El campo edad es requerido",
                 sexo: "El campo sexo es requerido",
                 comentario_escort : "El campo comentario es requerido",
                 photo_principal : "La foto principal es requerido",
                 photo_secundaria_1 : "La foto secundaria es requerido",
                 photo_secundaria_2 : "La foto secundaria es requerido"

               }

         });
           
           //Date picker
           $('#datepicker').datepicker({
           	 autoclose: true
           });
           
           $("#telefono").inputmask('9999-999-9999');
           
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
           
                   //actualizar combo de regiones y comuna
         
           //para refrescar el combo de factores reporte 5
         $('select[name="regiones"]').on('change', function() {
              var stateID = $(this).val();
              $('select[name="comuna_escort"]').empty();
           //   alert('stateid:'+ stateID);
         
                 if(stateID) {
                       $.ajax({
                          url: 'updatecomuna/'+stateID,
                          type: "GET",
                          dataType: "json",
                          success:function(data) {
         
                          $.each(data.comuna, function(i, comuna){
                             //do something
                             //console.log(comuna.nombre);
                             $('select[name="comunas"]').append('<option value="'+ comuna.id +'">'+ comuna.nombre+'</option>');
                          });
         
         
                       //   $('select[name="comuna_escort"]').empty();
                          if(data == ""){
                                $('select[name="comunas"]').append('<option value="0">'+'«« No hay Comunas »»'+'</option>');
                                
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
           
           });
           
      </script>
   </body>
</html>