<link rel="stylesheet" href="{{url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url('css/icon.css') }}">
<link rel="stylesheet" href='{{url("css/loader.css") }}'>
<link rel="stylesheet" href='{{url("css/idangerous.swiper.css") }}'>
<link rel="stylesheet" href='{{url("css/jquery-ui.css") }}'>
<link rel="stylesheet" href='{{url("css/stylesheet.css")}}'>
<link rel="stylesheet" href='{{url("css/magnific.css")}}'>
<div class="container-fluid">
<meta name="csrf-token" content="{{ csrf_token() }}" />

   @foreach($clientes as $row) 
   <div class="col-md-2">
      <div class="row">
         <div class="form-group">
            <div class="be-post">
               <a href="admin/escort_perfil_register/{{$row->id }}" 
                  class="be-img-block red-tooltip escort" id="escort_register" data-show="tip" style="cursor:pointer"
                  data-target="#exampleModalCenter" data-id="{{ $row->id }}" 
                  data-toggle="modal"
                  data-original-title="<div class='row'>
                  <div class='col-md-12'>
                     <div class='form-group'>
                        <p class='text-align:left;' style='font-size: 11px;'>
                           <i class='fa fa-user-circle'></i> {{ $row->nombres}}
                        </p>
                      </div>
                     </div>
                  </div>
                  <div class='row'>
                     <div class='col-md-12'>
                        <div class='form-group'>
                            <p class='text-align:left;'  style='font-size: 11px;'>
                              <i class='fa fa-whatsapp'></i> {{ trim($row->telefono) }}
                           </p>
                         </div>
                     </div>
                  </div>
                  <div class='row'>
                      <div class='col-md-12'>
                         <div class='form-group'>
                           <p class='text-align:left;' style='font-size: 11px;'>
                            <i class='fa fa-map-marker'></i> {{ $row->descripcion_comuna}}
                          </p>
                      </div>
                     </div>
                  </div>
                  " data-placement="bottom">
                  <!--"{{ url($row->foto_principal) }}!-->
                  <img src= "{{ url($row->foto_principal) }}" 
                     alt="omg" class="img-fluid img-thumbnail" style="width:137px;height:190px"  >
                  <span title="The tooltip" data-toggle="tooltip" data-placement="top" ></span>
               </a>
               <p class="be-post-title">{{ $row->nombres}}</p>
               <div class="author-post">
                    <a href="#"  id="follow_{{ $row->id }}" data-id = "{{ $row->id }}" data-action="follow"
                          class="be-user-activity-button be-follow-type">
                          <i class="fa fa-plus"></i><p style="color:#FFF;">SIGUEME</p>
                       </a>

                       <a href="#"  id="unfollow_{{ $row->id }}" 
                          data-id = "{{ $row->id }}" data-action="unfollow"
                          class="be-user-activity-button be-follow-type" style="display:none;">
                          <i class="fa fa-check-square"></i><p style="color:#FFF;"> SIGUIENDO</p>
                       </a>

                       <a href="#"  id="invitationFollow_{{ $row->id }}" 
                          data-id = "{{ $row->id }}" data-action="pending"
                          class="be-user-activity-button be-follow-type" style="display:none;">
                          <i class="fa fa-clock-o"></i><p style="color:#FFF;"> PENDIENTE</p>
                       </a>

               </div>
               <div class="info-block">
                  <span><i  id="like_{{$row->id}}"   class="fa fa-thumbs-o-up" data-ID="{{$row->id}}"></i>
                    <span id="like_{{$row->id}}-bs3">{{($likes_user) }}</span>
                  </span>
                  <!-- <span><i  id="like_{{$row->id}}"   class="fa fa-thumbs-o-down" data-ID="{{$row->id}}"></i>
                    <span id="like_{{$row->id}}-bs3"></span>
                  </span> -->
                  <span><i id="visit_{{$row->id}}" class="fa fa-eye"></i>
                     <span id="visit_{{$row->id}}-bs3"></span>
                  </span>
                  <span><i class="fa fa-comment-o"></i> 20</span>
               </div>
               </span>
            </div>
         </div>
      </div>
   </div>
   @endforeach
</div>
<script src="/js/jquery-2.1.4.min.js"></script>
<script>
   function myFunction(x) {
         alert("x:"+ x);
         x.classList.toggle("fa-thumbs-down");
   }
   
   $(document).ready(function(){

            $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
            });
             
              var idEscortarray = new Array();

               $('.fa-thumbs-o-up').each(function(){
                     idEscortarray.push($(this).attr('data-ID'));
               
                  });
                
                var estatus_follower = 0;
                  $.ajax({
                         type: "get",
                         url: "admin/getLikes",
                         data: {
                           arreglo:idEscortarray
                         },
                         dataType: 'JSON',
                         cache: false,
                         success: function (data)
                         {
                           console.log(data);
                    
                           $.each(data, function(index) {
                              
                              // console.log(data[index].cont);
                              //  console.log(data[index].escortId);
                               console.log(data[index].visitado);
                               //console.log(data[index].visitado.total);
                          

                              $('#like_' + data[index].escortId+'-bs3').html(data[index].cont);
                              $('#visit_'+ data[index].escortId+'-bs3').html(data[index].visitado.total == null ? 0 :data[index].visitado.total); 
                              
                              estatus_follower = (data[index].follow_escort.status_invitacion == "null" ? 0 : data[index].follow_escort.status_invitacion);

                              if (estatus_follower == "1" ) {
                                 $("#follow_" + data[index].escortId).hide(); 
                                 $("#invitationFollow_" + data[index].escortId).show();
                                 $("#invitationFollow_" + data[index].escortId).addClass("pending_button");
                               } 

                              
                        
                        
                        });
                       
                            
                         }, 
                         error: function (e){
                           console.log(e.responseText);
                         
                         }
                     });

                     //location.reload();





               $('.fa-thumbs-o-up').click(function(){ 
                     //  $(this).toggleClass("fa-thumbs-down");
                     //  var estado_icon = '';
                     //  $('.fa-thumbs-o-up').toggleClass('active');
                     //  var act = $('.fa-thumbs-o-up').hasClass("active");
                     

                     //  if(act){
                     //    estado_icon = 0;
                     // }else{
                     //    estado_icon = 1;
                     // }

                     // if ($(this).toggleClass("fa-thumbs-down")) {
                     //    alert("dedo abajo");
                     // }

                     
                     // if $(this).hasClass("fa fa-thumbs-o-up") {
                     //    alert("subir");
                     // }else {
                     //    alert("bajar");
                     // }
                      var id_like = $(this).attr('data-ID');

                      var data = {
                         id:id_like,
                     };

                      $.ajax({
                         type: "POST",
                         url: "admin/like",
                         data: data,
                         cache: false,
                         success: function (data)
                         {
                           location.reload();
                           $('#like_'+id_like+'-bs3').html(data);
                           
                             console.log(data); 
                            
                         }, 
                         error: function (data){
                             console.log(data);
                         
                         }
                     });

               });



   
                  $('.escort').click(function(event){
                        event.stopPropagation();
                  });
   
               
                  $("body").tooltip({
                     selector:'[data-show=tip]',
                     animated: 'fade',
                     html: true
                     
                     
                  });

           //boton seguir
           $(".be-follow-type").click(function () {

               var id_follower = $(this).attr('data-id');
               var action  =  $(this).attr('data-action');

               $.ajax({
                  type: "POST",
                  url: "admin/follow_escort",
                  data: {
                       uid: id_follower,
                       action:action
                     
                      },
                      success: function (data) {
                       console.log(data);
                        if (data == "1")
                           {
                              $("#follow_" + id_follower).hide();
                              $("#unfollow_" + id_follower).show();
                              $("#unfollow_" + id_follower).addClass("unfollow_button");
                              location.reload();
                            
                           } else if (data == "2") {
                              $("#unfollow_" + id_follower).hide();
                              $("#follow_" + id_follower).show();
                              location.reload();
                           } 
           
                       }
                  });

               });


   });//FIN
</script>