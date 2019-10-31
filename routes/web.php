<?php

    Route::get('/', 'PagesController@home')->name('inicio');

    Auth::routes();

     //Rutas del Menu de Categorias.
    Route::get('listar_maduras/{categorias}','PagesController@home')->name('listar_maduras');
    Route::get('listar_maduras/escort_perfil/{id}','EscortController@getPerfilEscort')->name('escort.perfil');
    Route::get('listar_servicios/escort_perfil/{id}','EscortController@getPerfilEscort')->name('escort.perfil');
    
   //Rutas del Menu de Servicios.
   Route::get('listar_servicios/{categorias}','PagesController@home')->name('listar_servicios');

   //Route::get('buscar_todas/{filtro}', 'PagesController@searchall')->name('buscar_todas');
   Route::get('buscar_todas', 'PagesController@searchall')->name('buscar_todas');

   Route::get('getIpdetails','PagesController@getGeoLocation')->name('getIpdetails');

   Route::get('get-ip-details', function () {
   // $ip = '192.168.1.90';
    $details = json_decode(file_get_contents("http://ipinfo.io/json"));
    //$position = geoip()->getLocation('190.22.168.166');
      // $data = \Location::get($ip);
     $position = Location::get('190.22.168.166');
      //$ip= \Request::ip();
    //  dd($details->city);
  });
  
    //Rutas del menu de filtros.

    Route::POST('filter_SelectMenu', 'PagesController@filterOpciones')->name('filter_SelectMenu');

     // // Registration Routes...
  if ($options['register'] ?? true) {
      Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
      Route::POST('registro','UserController@store')->name('registro');

     //  Route::post('register', 'Auth\RegisterController@register');
  }


      Route::get('admin', 'HomeController@index')->name('home');


      Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware' => 'auth'],
                function () {
           //rutas de administración
           

          Route::get('clientes', 'ClienteController@index')->name('admin.clientes.index');
          Route::get('showInfoCliente/{id}', 'ClienteController@getInfoCliente')->name('admin.clientes.info');
          Route::get('updateestado_escort', 'ClienteController@updateEstadoescort')->name('admin.clientes.updateEstado');            
          
          // Route::resource('file', 'FileController');

           Route::POST('files/store','FileController@store')->name('files.store');

           //actualizar escort perfil.
 
           Route::POST('/updateEscort_info', 'ClienteController@updateEscortInfo');

           Route::get('actualizarcomuna/{id}', 'ComunaAdminController@updatecomboComuna');
           
           Route::delete('photos/{photo}', 'ClienteController@destroy')->name('admin.photos.destroy');
           Route::delete('photos/storage/{photo}', 'ClienteController@eliminar')->name('admin.photos.eliminar');

           //actualizar photo perfil de escort
           Route::post('updatephoto_perfil', 'ClienteController@update_avatar')->name('admin.update.perfil_foto');

           //mostrar a el usuario registrado el perfil de la escort
           Route::get('escort_perfil_register/{id}','EscortRegisterController@getPerfilRegister')->name('escort.perfil_register');


           Route::resource('comments', 'CommentController');
             
           Route::get('getLikes','LikeController@getAllLikeEscort')->name('getlike');
           Route::post('like','LikeController@LikeEscort')->name('like');

           Route::post('addnews_escort', 'NewsController@store')->name('admin.addnews.store');

           //cargar video
           Route::get('video', 'VideoController@index')->name('admin.clientes.video');
           //subir
           Route::POST('uploadvideo', 'VideoController@upload_video')->name('admin.clientes.upload.video');

           //Eliminar Video
           Route::POST('deletevideo', 'VideoController@delete_video')->name('admin.clientes.delete.video');


          //follow escort
          Route::get('/follow/escort','FollowController@addfollow')->name('admin.follow.escort');
           
          //ruta nav bar solicitud amistad
          Route::get('/solicitud/friendship','FollowController@friendship')->name('admin.follow.friendship');

          Route::POST('confirmfriendship', 'FollowController@confirmfriendship')->name('admin.follow.confirm.friendship');

          //borrar comentario
          Route::GET('/delete/comments', 'CommentController@deleteComentario')->name('admin.delete.comments');

          //Calificar Escort nav bar.
          Route::GET('calificar/escort', 'EscortRegisterController@qualifyEscort')->name('admin.calificar.escort');
             
            //listar escort rating.
           Route::get('calificar/listarEscort', 'DetailController@listarEscort')->name('admin.list.escort');
                 
          //rating escort
           Route::post('calificar/rating', 'DetailController@setrating')->name('admin.rating.escort');

          //obtener calificacion total de la escort.
           Route::post('/calificacion/total_escort', 'DetailController@showCalifications')->name('admin.total.calification');

      }); 

      Route::get('updatecomuna/{id}', 'ComunaController@updatecomboComuna')->name('setrating');
    // Route::get('/admin', 'AdminController@index')->name('layout');
    // Route::get('admin', function() {

    //   return view('admin.dashboard');

    // });

  //Rutas de la Escort
    Route::get('/registro_escort','EscortController@index')->name('registro_escort');
    Route::POST('/create_escort','EscortController@store')->name('create_scort');
    Route::get('/getEscortInfo','EscortController@getEscortInfo' ); 
    Route::post('images-upload', 'HomeController@imagesUploadPost')->name('images.upload');
    Route::get('escort_perfil/{id}','EscortController@getPerfilEscort')->name('escort.perfil');
    Route::post('buscar_escort', 'PagesController@home')->name('buscar_escort');
 

 // Authentication Routes...
    //Route::post('/login/user', 'CustomLoginController@loginUser');

 

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('acceso');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');


     
 

  // Password Reset Routes...
  if ($options['reset'] ?? true) {
         Route::resetPassword();
    }
  // Email Verification Routes...
   if ($options['verify'] ?? false) {
       Route::emailVerification();
   }