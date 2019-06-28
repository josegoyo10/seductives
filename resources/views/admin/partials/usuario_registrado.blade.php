      <link rel="stylesheet" href="{{url('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{url('css/icon.css') }}">
      <link rel="stylesheet" href='{{url("css/loader.css") }}'>
      <link rel="stylesheet" href='{{url("css/idangerous.swiper.css") }}'>
      <link rel="stylesheet" href='{{url("css/jquery-ui.css") }}'>
      <link rel="stylesheet" href='{{url("css/stylesheet.css")}}'>
      <link rel="stylesheet" href='{{url("css/magnific.css")}}'>


<div class="container-fluid">
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
                    <img src= "#" 
                 alt="omg" style="width:130px; heigth:117px;margin:0 auto;" class="centrar">
                    <span title="The tooltip" data-toggle="tooltip" data-placement="top" ></span>
                 </a>
              </span>

            </div>
          </div>
        </div>
     </div>
       @endforeach
    </div>

    <script src="/js/jquery-2.1.4.min.js"></script>

    <script>

      $(document).ready(function(){

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