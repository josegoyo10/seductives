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
   <div class="col-md-3">
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
                     alt="omg" class="img-fluid" style="width:217px;height:240px"  >
                  <span title="The tooltip" data-toggle="tooltip" data-placement="top" ></span>
               </a>
               <p class="be-post-title">{{ $row->nombres}}</p>
               <div class="author-post">
                  <img src="img/a1.png" alt="" class="ava-author">
                  <span>Por Seductives</span>
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
                          

                              $('#like_'+data[index].escortId+'-bs3').html(data[index].cont);
                              $('#visit_'+data[index].escortId+'-bs3').html(data[index].visitado.total == null ? 0 :data[index].visitado.total); 
                            
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
   });
   
</script>