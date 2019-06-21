<!DOCTYPE html>
<html>
   <head>
      <title>@yield('meta-title','Seductives')</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" href="img/favicon.png">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{url('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{url('css/icon.css') }}">
      <link rel="stylesheet" href='{{url("css/loader.css") }}'>
      <link rel="stylesheet" href='{{url("css/idangerous.swiper.css") }}'>
      <link rel="stylesheet" href='{{url("css/jquery-ui.css") }}'>
      <link rel="stylesheet" href='{{url("css/stylesheet.css")}}'>
      <link rel="stylesheet" href='{{url("css/magnific.css")}}'>
      <!--Fontawesome CDN-->
      <!--link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous"!-->
      <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"!-->
       

      @stack('styles')
   </head>
   <body > 
      <!-- THE LOADER -->
      <div class="be-loader">
         <div class="spinner">
            <img src='{{ url("img/logo-loader.png") }}'  alt="">
            <p class="circle">
               <span class="ouro">
               <span class="left"><span class="anim"></span></span>
               <span class="right"><span class="anim"></span></span>
               </span>
            </p>
         </div>
      </div>
      <!-- THE HEADER -->
      @include('header')
      <!-- MAIN CONTENT -->
      @yield('content')
      <!-- THE FOOTER -->
      @include('footer')
      <div class="be-fixed-filter"></div>
      <div class="large-popup login" id="div_login">
         <div class="large-popup-fixed"></div>
         <div class="container large-popup-container">
            <div class="row">
               <div class="col-md-12 col-md-push-3 col-lg-8 col-lg-push-3  large-popup-content">
                  <div class="row">
                     <div class="col-md-12">
                        <i class="fa fa-times close-button"></i>
                        <h3 class="large-popup-title" style="position:relative;top:0px;">Acceso</h3>
                     </div>
                      
                      <form id="login-form" method="post" onsubmit="return LoginUser()" role="form" style="display: block;" class="popup-input-search">

                        <div class="col-md-5">
                           <input  class="form-control @error('email') is-invalid @enderror" name="email" 
                             type="email" required="" placeholder="Email" value="{{old('email') }}" required autofocus>
                              <span class="invalid-feedback" role="alert" 
                                 style="display: none;color:#fff;" id="error_mail">
                                     <strong></strong>
                              </span>
                              
                        </div>
                        <div class="col-md-5">
                           <input  type="password" required="" placeholder="Contraseña"
                              class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="col-md-2">
                           <!--input type="submit" id="btn_login" class="btn btn-primary btn-prime white btn-flat"
                            value="Entrar"/!-->
                            <!--button type="button" id="btn_login" class="btn btn-primary btn-prime white btn-flat">Entrar</button!-->
                             <input type="submit" name="login-submit" id="login-submit" tabindex="4" 
                             class="btn-login btn color-1 size-2 hover-2" value="Entrar">
                        </div>
                        <br><br>
                        <div class="col-xs-6" style="margin-top:10px;">
                           <a href="blog-detail-2.html" class="link-large-popup" style="color:#FFF;">Olvidaste tu Contraseña?</a>
                           <a href="#" class="link-large-popup" data-toggle="modal" 
                              data-target="#exampleModal" id="btn_registro" style="color:#FFF;">Registrarse</a>
                       </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!--Modal para Registrar un nuevo Usuario !-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Registro de Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="row justify-content-center">
                     <div class="col-md-12">
                        <div class="box box-primary">
                           <div class="box-header">
                              @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                 <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                 </ul>
                              </div>
                              @endif
                              <div id="success-msg" class="hide">
                                 <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                    <strong> Su registro ha sido Exitoso...!!</strong>
                                 </div>
                              </div>
                              <form method="POST" id="register">
                                 {{ csrf_field() }}
                                 <input type="hidden" name="id_tipo_usuario" value="1">
                                 <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }} row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombres</label>
                                    <div class="col-md-6">
                                       <input id="name" type="text" 
                                          class="form-control" name="name" 
                                          value="{{ old('name') }}" required autocomplete="name" autofocus>
                                       <span class="text-danger">
                                       <strong id="name-error"></strong>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Apellidos</label>
                                    <div class="col-md-6">
                                       <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                       <span class="text-danger">
                                       <strong id="last_name-error"></strong>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                                    <div class="col-md-6">
                                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                       <span class="text-danger">
                                       <strong id="email-error"></strong>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                                    <div class="col-md-6">
                                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                       <span class="text-danger">
                                       <strong id="password-error"></strong>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
                                    <div class="col-md-6">
                                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <div class="col-md-12 text-center">
                                       <button type="button" id="submitForm" class="btn btn-primary btn-prime white btn-flat">Registrar</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--div class="main-color">
         <div class="title">Main Color:</div>
         <div class="colours-wrapper">
            <div class="entry color1 m-color active" data-colour="style/stylesheet.css"></div>
            <div class="entry color3 m-color"  data-colour="style/style-green.css"></div>
            <div class="entry color6 m-color"  data-colour="style/style-orange.css"></div>
            <div class="entry color8 m-color"  data-colour="style/style-red.css"></div>
            <div class="title">Second Color:</div>
            <div class="entry s-color  active color10"  data-colour="style/stylesheet.css"></div>
            <div class="entry s-color color11"  data-colour="style/style-oranges.css"></div>
            <div class="entry s-color color12"  data-colour="style/style-greens.css"></div>
            <div class="entry s-color color13"  data-colour="style/style-reds.css"></div>
         </div>
         </div>
         <div class="open"><img src="img/icon-134.png" alt=""></div>
         </div> -->
      <!-- SCRIPTS	 -->
      
      <script src='{{ url("js/jquery-2.1.4.min.js") }}'></script>
      <script src='{{ url("js/jquery-ui.min.js") }}'></script>
      <script src='{{ url("js/bootstrap.min.js") }}'></script>		
      <script src='{{ url("js/idangerous.swiper.min.js") }}'></script>
      <script src='{{ url("js/jquery.mixitup.js") }}'></script>
      <script src='{{ url("js/jquery.viewportchecker.min.js") }}'></script>
      <script src='{{ url("js/jquery.viewport.js") }}'></script>
     
      <!--script src='{{ url("js/filters.js") }}'></script!-->
      <script src='{{ url("js/global.js") }}'></script>
      <script  src='{{ url("assets/dist/js/tooltipster.bundle.min.js") }}'></script>

      @stack('scripts')
      <script>

            function LoginUser()
                 {

                  // alert('prueba');
                     var token    =  "{{ csrf_token() }}";
                     var email    = $("input[name=email]").val();
                     var password = $("input[name=password]").val();
                     var data = {
                         _token:token,
                         email:email,
                         password:password
                     };
                     // Ajax Post 
                     $.ajax({
                         type: "post",
                         url: "/login",
                         data: data,
                         cache: false,
                         success: function (data)
                         {
                             //location.reload();
                             console.log(data); 
                             console.log('login request sent !');
                             // console.log('status: ' +data.status);
                             //  console.log('status: ' +data.user);
                             // console.log('message: ' +data.message);
                             window.location = "/admin";
                         }, 
                         error: function (data){
                             console.log(data);
                            $('#error_mail').html(data.responseJSON.errors.email[0]).show();
                          //  console.log(data.responseJSON.errors.email[0]);
                            // console.log(data);
                            // alert('Fail to run Login..');
                         }
                     });
                     return false;
                 }





         $( document ).ready(function() {
         
            $('#btn_registro').click(function(){
         			// alert('Sign new href executed.');
         
         			$('#div_login').hide();
             });
         
             
             

            //login usuario
            // $("#btn_login").click(function(e){
            //      e.preventDefault();
            //       var loginForm = $("#login-form");
            //       var formData = loginForm.serialize();

            //      $.ajax({
                      
            //           url:'/login',
            //           type:'POST',
            //           data:formData,
            //            cache: false, 
            //            processData: false,
            //            contentType: false, 
            //          success: function (data) {
            //             console.log(data.success);
            //            //alert(data);
            //            // console.log(data.intended);
            //           window.location = '/admin' ;
            //           },
            //             error: function (jXHR, textStatus, errorThrown) {
            //              alert(errorThrown);
            //            }

            //     });
            //  }); 



         
             //registrar usuario.
             $('body').on('click', '#submitForm', function(){
               var registerForm = $("#register");
               var formData = registerForm.serialize();
               $( '#name-error' ).html( "" );
               $( '#last_name-error' ).html( "" );
               $( '#email-error' ).html( "" );
               $( '#password-error' ).html( "" );
         
                  $.ajax({
                        url:'/registro',
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
                                    $('#exampleModal').addClass('hide');
                              }, 4000);
                           }
                        },
                     });
                  });
         
         
         });
      </script>
   </body>
</html>