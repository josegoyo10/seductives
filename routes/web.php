<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
    Route::get('/', 'PagesController@home')->name('inicio');

    Auth::routes();


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

          //rating escort
        //  Route::post('/rating/new', 'DetailController@setrating');
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



 // Authentication Routes...
    //Route::post('/login/user', 'CustomLoginController@loginUser');

 

    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');


     Route::POST('registro','UserController@store');

 

  // Password Reset Routes...
  if ($options['reset'] ?? true) {
         Route::resetPassword();
    }
  // Email Verification Routes...
   if ($options['verify'] ?? false) {
       Route::emailVerification();
   }