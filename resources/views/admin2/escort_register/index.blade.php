@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{url('css/icon.css') }}">
<!-- <link rel="stylesheet" href='{{url("css/stylesheet.css")}}'> -->
<link rel="stylesheet" href='{{url("css/idangerous.swiper.css")}}'>
<!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href='{{url("css/estilos.css")}}' type="text/css"> -->
<link rel="stylesheet" href='{{url("css/albery.css")}}' type="text/css">
<link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">
<style>

    #priceTable {
       font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
       border-collapse: collapse;
       width: 100%;
    }

        #priceTable td, #priceTable th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #priceTable tr {
            background-color: #f2f2f2;
        }

        #priceTable th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }


</style>

@endsection
@section('content')
<!-- MAIN CONTENT -->
<section class="content">
  <div class="row">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <a href="{{ URL::previous() }}" class="btn btn-primary btn-md" role="button"> Regresar</a>
      <div class="col-md-12">
         <div class="col-md-9 col-md-push-3" style="border: 1px solid #d8d6d6;border-radius: 10px 30px;" >
            <div>
             <br>
               <div class="container">
                  <div class="row">
                   
                     <div class="col-sm-2" style="font-size:14px;">Edad: {{ $query->edad }} años</div>
                       <div class="col-sm-4" style="font-size:14px;">Teléfono: <i class='fa fa-whatsapp' style="color:#3fff00"></i>&nbsp;{{ $query->telefono }}</div>
                           @if ($sql_rating_escort == null)
                              <div class="col-sm-2">
                                 <button id="myBtn" class="btn btn-default" data-toggle="modal" 
                                 data-target="#btnCalificar">Calificar Escort</button>
                              </div>
                           @endif
                       </div>
                    
                     <!-- Modal -->
                     <div id="btnCalificar" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content modal-md">
                              <div class="modal-header">
                                 <h2 class="modal-title" id="exampleModalLabel">Calificación de la Escort</h2>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                <input type="hidden" id="cont_servicios" value = "{{ $suma_tipoServicios }}" >
                                 <table class="table">
                                    <thead>
                                       <tr class="bg-primary">
                                          <th style="width: 35%">Lugar y Presencia</th>
                                          <th style="width: 35%"> Valor </th>
                                          <th style="width: 30%"></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <span style="font-size:14px">Llamada:</span>
                                             <div  id='llamada' data-id="llamada"></div>
                                             <div>
                                                <select class="form-control options" id="eleccion_llamada">
                                                   <option value="0">«« SELECCIONE »»</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                             </div>
                                          </td>
                                          <td>
                                             <span style="font-size:14px">Lugar de Atención: </span>
                                             <div  id='lugar_atencion' data-id="lugar_atencion"></div>
                                             
                                                <select class="form-control options" id="eleccion_lugar_atencion">
                                                   <option value="0">«« SELECCIONE »»</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                          </td>
                                          <td>
                                             <span style="font-size:14px">Presentación personal:</span>
                                             <div  id='present_personal' data-id="present_personal"></div>
                                                <select class="form-control options" id="eleccion_present_personal">
                                                  <option value="0">«« SELECCIONE »»</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                          </td>
                                       </tr>
                                       <hr>
                                       <tr class="bg-primary">
                                          <th style="width: 35%">Fisico</th>
                                          <th style="width: 35%"></th>
                                          <th style="width: 30%"></th>
                                       </tr>
                                       <tr>
                                          <td>
                                             <span style="font-size:14px">Rostro: </span>
                                             <div  id='rostro' data-id="rostro"></div>
                                                <select class="form-control options" id="eleccion_rostro">
                                                   <option value="0">«« SELECCIONE »»</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                          </td>
                                          <td>
                                             <span style="font-size:14px">Busto:</span>  
                                             <div  id='busto' data-id="busto"></div>
                                                <select class="form-control options" id="eleccion_busto">
                                                  <option value="0">«« SELECCIONE »»</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                          </td>
                                          <td>
                                             <span style="font-size:14px">Trasero:</span>
                                               <div id='trasero' data-id="trasero"></div>
                                                <select class="form-control options" id="eleccion_trasero">
                                                   <option value="0">«« SELECCIONE »»</option>
                                                   <option value="1">1</option>
                                                   <option value="2">2</option>
                                                   <option value="3">3</option>
                                                   <option value="4">4</option>
                                                   <option value="5">5</option>
                                                   <option value="6">6</option>
                                                   <option value="7">7</option>
                                                   <option value="8">8</option>
                                                   <option value="9">9</option>
                                                   <option value="10">10</option>
                                                </select>
                                          </td>
                                       </tr>
                                     
                                       <hr>
                                       <tr>
                                          <tr class="bg-primary">
                                             <th style="width: 35%">Servicios Ofrecidos</th>
                                             <th style="width: 35%"></th>
                                             <th style="width: 30%"></th>
                                          </tr>
                                          <td colspan="6">

                                          
                                                   @foreach($tipo_servicios as $tipo)
                                                         <br>
                                                         <span style="font-size:14px">{!! $tipo->nombre_servicio !!}</span>
                                                         <div id="{!! $tipo->nombre_servicio !!}" data-id="{!! $tipo->nombre_servicio !!}"></div>
                                                         <select class="form-control options servicios" data-nombre = "{!! $tipo->nombre_servicio !!}"
                                                               id="eleccion_{!! $tipo->nombre_servicio !!}">
                                                               <option value="0">«« SELECCIONE »»</option>
                                                               <option value="1">1</option>
                                                               <option value="2">2</option>
                                                               <option value="3">3</option>
                                                               <option value="4">4</option>
                                                               <option value="5">5</option>
                                                               <option value="6">6</option>
                                                               <option value="7">7</option>
                                                               <option value="8">8</option>
                                                               <option value="9">9</option>
                                                               <option value="10">10</option>
                                                         </select>
                                                    @endforeach
                                           </td>
                                       </tr>
                                       <tr>
                                          <td colspan="12">
                                             <div class="form-group">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <label for="exampleFormControlTextarea1">Comentarios</label>
                                                      <textarea class="form-control" id="comentarios_user" name="comentarios_user" rows="3"></textarea>
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
                                       <h3> Nota Final: &nbsp;<span id="nota_final">0</span></h3>
                                       <input type="hidden" id="valor_nota" value=""/>
                                       <input type="hidden" id="escort_id" value="{!! $query->id !!}" />
                                    </tbody>
                                 </table>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                 <button type="button" class="btn btn-primary" id="btn_rating">Guardar</button>
                              </div>
                           </div>
                        </div>
                     </div>
                <br>
               
                  <div class="contenido" style="width:870px; margin:0 auto;">
                     <div class="albery-container">
                        <div class="albery-wrapper">
                           <div class="albery-item">
                              <img src="{{ url('uploads/escort_fotos/'.$query->foto_secundaria_2) }}?image=655"/>
                           </div>
                           <div class="albery-item">
                              <img src="{{ url('uploads/escort_fotos/'.$query->foto_secundaria_1) }}?image=656"/>
                           </div>
                        </div>
                        <div class="move-right">
                           <a href="#" id="rightArrow"></a>
                        </div>
                        <div class="move-left">
                           <a href="#" id="leftArrow"></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div> 
           
            <div class="be-comment-block">
               @if ($sql_follow_escort != null)
               @if ($sql_follow_escort->status_invitacion == 2)         
               <h3 class="comments-title">Comentarios ({!! $count !!})</h3>
               @include('admin.escort_register.commentsDisplay', ['comments' => $comentarios, 'escort_id' => $query->id])
               <h4>Añadir Comentario:</h4>
               <form method="POST" action="{{ route('comments.store' ) }}">
                  @csrf
                  <div class="form-group">
                     <textarea class="form-control" name="body" rows="3"></textarea>
                     <input type="hidden" name="escort_id" value="{{ $query->id }}" />
                  </div>
                  <div class="form-group"> 
                     <input type="submit" class="btn color-1"  style="padding-top:10px"
                        value="Añadir Comentario" />
                  </div>
               </form>
               @endif 
               @endif
            </div>
         </div>
         <div class="col-md-3 col-md-pull-9 left-feild">
            <div class="be-user-block">
               <div class="be-user-detail">
                  <a class="be-ava-user" >
                  <img src="{{ url('uploads/escort_fotos/'.$query->foto_principal) }}" alt="" class="img-circle"> 
                  </a>  
                  <p class="be-use-name">{{ $query->apodo_escort }}</p>
                  <span class="be-user-info">
                  {{ $query->descripcion_comuna }},{{ $query->descripcion_region }}
                  </span>
               </div>
               <h5 class="be-title"> Sobre Mi</h5>
               <p class="be-text-userblock">
                  {{ $query->descripcion_servicio }}
               </p>
               <hr>  
               
               @if (($sql_rating_total > 0))
                  @php
                     $nota_final = number_format($sql_rating_total / $count_escort, 2, ',', ' ');
                  @endphp
                     @else
                       @php
                           $nota_final = 0
                       @endphp
               @endif
              
               <h5 class="be-title">Nota Calificada: <span id="promedio_final"><b>{!! $nota_final !!} / 10</b></span></h5>
               <button type="button" class="btn btn-primary btn-md btnAdd" data-toggle="modal" 
                 data-target="#myModal">
                 Calificaciones
               </button>
            
            </div>
            <br>
            @if(!empty($sql_follow_escort->status_invitacion))
            @if (($sql_follow_escort->status_invitacion == 0) || ($sql_follow_escort->status_invitacion == NULL))
            <a href="#" class="be-user-activity-button be-follow-type "  
               id="follow" data-id = "{{ $query->id }}" data-action="follow">
            <i class="fa fa-thumbs-o-up"></i> SIGUEME
            </a>
            @endif
            @if ($sql_follow_escort->status_invitacion == 1)
            <a href="#"  id="invitationFollow" 
               data-id = "{{ $query->id }}" data-action="pending"
               class="be-user-activity-button be-follow-type pending_button" >
               <i class="fa fa-clock-o"></i>
               <p style="color:#FFF;"> PENDIENTE</p>
            </a>
            @endif
            @if ($sql_follow_escort->status_invitacion == 2)
            <!-- <a href="#"  id="unfollow" 
               data-id = "{{ $query->id }}" data-action="unfollow"
               class="btn btn-success unfollow_button">
               <i class="fa fa-check-square" style="color:#FFF;" value="SIGUIENDO"></i>
               <p style="color:#FFF;"> SIGUIENDO</p>
            </a>
             -->
             <a  href="#"  id="unfollow"  data-id = "{{ $query->id }}"
                data-action="unfollow" class="btn btn-success unfollow_button" 
               role="button"><i class="fa fa-check-square"></i> SIGUIENDO
             </a>
            @endif
            @else
            <a href="#" class="be-user-activity-button be-follow-type "  
               id="follow" data-id = "{{ $query->id }}" data-action="follow">
            <i class="fa fa-thumbs-o-up"></i> SIGUEME
            </a>
            @endif
            <!--botones !-->
            <div id="btnInvitationFollow" style="display:none;">
               <a href="#"  id="invitationFollow" 
                  data-id = "{{ $query->id }}" data-action="pending"
                  class="btn btn-warning be-follow-type pending_button" >
                  <i class="fa fa-clock-o"></i>
                  <p style="color:#FFF;"> PENDIENTE</p>
               </a>
            </div>
            <div id="btnunfollow" style="display:none;">
               <a href="#"  id="unfollow" 
                  data-id = "{{ $query->id }}" data-action="unfollow"
                  class="btn btn-success be-follow-type unfollow_button" >
                  <i class="fa fa-clock-o"></i>
                  <p style="color:#FFF;"> SIGUIENDO</p>
               </a>
            </div>
            <h3 class="letf-menu-article text-center">Ultimas Fotos</h3>
            <div  class="swiper-container" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                  <div class="swiper-slide">
                 
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
@endsection

   <!-- Modal -->
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-lg">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="modal-title" id="myModalLabel"><b>Calificaciónes de los Usuarios<b></h2>
         </div>
           <div class="modal-body">
                <div class="row">
                   <div class="col-sm-6" style="border-right: 1px solid #ccc;">
                     <table class="table">
                        <thead>
                           <tr class="bg-primary">
                              <th style="width: 35%">Lugar y Presencia</th>
                              <th style="width: 35%"> Valor </th>
                              <th style="width: 30%"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>
                                <p class="text-center"><b>Llamada:</b></p><b><p id='llamada' class="text-center" data-id="llamada"></p></b>
                              </td>

                              <td>
                                 <p class="text-center"><b>Lugar de Atención: </b></p><b>
                                 <p  class="text-center" id='lugar_atencion' data-id="lugar_atencion"></p></b>
                               
                              </td>
                              <td>
                                 <p class="text-center"><b>Presentación:</b></p><b>
                                 <p  class="text-center" id='present_personal' data-id="present_personal"></p></b>
                              </td>
                           </tr>
                           <hr>
                           <tr class="bg-primary">
                              <th style="width: 35%">Fisico</th>
                              <th style="width: 35%"> Valor </th>
                              <th style="width: 30%"></th>
                           </tr>
                           <tr>
                              <td>
                                 <p class="text-center"><b>Rostro: </b></p><b>
                                 <p  class="text-center" id='rostro' data-id="rostro"></p></b>
                              </td>
                              <td>
                                 <p   class="text-center"><b>Busto:</b></p><b> 
                                 <p   class="text-center"  id='busto' data-id="busto"></p></b>
                              </td>
                              <td>
                                 <p class="text-center"><b>Trasero:</b></p><b>
                                 <p class="text-center" id='trasero' data-id="trasero"></p>
                              </td>
                           </tr>
                           <hr>
                           <tr>
                           <tr class="bg-primary">
                              <th style="width: 35%">Servicios</th>
                              <th style="width: 35%"> Valor </th>
                              <th style="width: 30%"></th>
                           </tr>
                                <td>
                                     <div class="row">

                                          @foreach($rating_calificado as $tipo)
                                          
                                             @php
                                                $notaEvaluada = number_format($tipo->total / $count_escort, 2, ',', ' ');

                                             @endphp

                                             <div class="col-md-12">
                                                  <span style="font-size:13px"><strong>{!! $tipo->nombre_servicio !!}: {!! $notaEvaluada !!} </strong></b>
                                                  <hr>
                                            </div>
                                          
                                          @endforeach
		                              </div>
                                 </td>
                              <tr>
                                 <td>
                                 <p class="text"><b>Nota Final:</b> <b><span id="average_final">{!! $nota_final !!}</span></b></p>
                                 </td>
                              </tr>
                           </tr>
                        </table>
                     </div><!--fin 1 !-->
                     <div class="col-sm-6"> 
                         <div class="table-responsive-sm">     
                           <table class="table-condensed priceTable"  id="tbcomentariosUsuarios">
                              <tr>
                                 <th>Fecha</th>
                                 <th>Usuario</th>
                                 <th>Nota</th>
                                 <th>Comentario</th>
                              </tr>
                              
                           </table>
                       </div>
                     </div><!--fin 2 !-->
                 </div><!--fin row !-->
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
      </div>
   </div>
</div>

<!-- SCRIPTS	 -->
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/albery.js')}}"></script>
<!--script src="{{asset('js/starrr.js')}}"></script!-->
<script src="{{asset('js/sweetalert2.all.min.js') }}"></script>

<script>
   $.noConflict();

   function getDivSum(selector) {
	var sum = 0;
   var totaL = 0;
      $('.choice').each(function() {
          var opc = $(this).html();
           if ((opc != NaN) && (opc != "")) {
               sum += parseInt($(this).html());
           }
      });
      console.log("suma:" + sum); 
      total = Math.round(((sum)));
      $('#nota_final').html(total);
      $('#valor_nota').val(total);
      return total;
   }

    function getPromedio() {
       var sum = 0;
       var totaL = 0;

        $('.options').each(function() {
                     sum += parseInt(this.value);
         });
          total = Math.round(((sum)));
         return total;
    }

     jQuery(document).ready(function( $ ) {

          $('#nota_final').val('');
     
             $(".albery-container").albery({
                speed: 500,
                imgWidth: 600,
             });
       
          $.ajaxSetup({
                   headers:{
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                   }
                });
           
            //boton seguir
            $(".be-follow-type").click(function(event) {
                  
                 event.preventDefault();
    
                    var id_follower = $(this).attr('data-id');
                    var action      =  $(this).attr('data-action');
    
                    $.ajax({
                       headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                       type: "get",
                       url: '{{url("admin/follow/escort")}}',
                       data: {
                          uid: id_follower,
                          action:action
                          
                          },
                          dataType: 'JSON',
                          success: function (data) {
                          console.log(data);
                             if (data == "1")
                                {
                                   
                                   $("#follow").hide();
                                   $("#invitationFollow").show();
                                   $("#invitationFollow").addClass("pending_button");
                                   $("#btnInvitationFollow").show();
                               } else if (data == "2") {
                                  
                                   $("#invitationFollow").hide();
                                   $("#unfollow").show();
                                   $("#invitationFollow").addClass("unfollow_button");
                                  // location.reload();
                                } 
    
                          }
                       });
    
              });

            //   $('.starrr').starrr({
            //       change: function(e, value){
            //          var valor = $(this).attr('data-id');

            //         if (value) {
            //               $('.your-choice-was').show();
            //               $('#eleccion_'+ valor).val(value);
            //               $('#eleccion_'+ valor).text(value);

            //               getDivSum("choice");
            //          } else {
            //          $('.your-choice-was').hide();
            //           }
            //       }
            //    });
            $(document).on("change",".options",function(e) {
                  var sum = 0;
                  var totaL = 0;

                  $('.options').each(function() {
                     sum += parseInt(this.value);
                  });
                  total = Math.round(((sum)));
                  $('#nota_final').html(total);
                  //$('#promedio_final').val(total);
                  // alert("valor:" + total);
               }); 

               $(document).on("click","#btn_rating",function() {
                 
                     var valor_nota    = getPromedio();
                     var  contador_servicios = $('#cont_servicios').val();
                     var average_final = (valor_nota/contador_servicios).toFixed(2);
                     var cont =0;
                     var array_services = [];
                     //$(this).attr('data-nombre')
                  
                
                     var isValid = true;
                     $(".options").each(function() {
                        $(".error").html();
                        if ($(this).val() == "0") {
                          cont+=1;
                           isValid = false;
                        }
                    });

                    if (cont > 0) {
                            Swal.fire(
                                          'Campos Requeridos!',
                                          'Por favor seleccione todos los campos requeridos..!',
                                          'error'
                                          );
                      
                     } else {
                        isValid = true;
                     }

                  if (isValid == true) {
                     Swal.fire({
                           title: 'Esta Seguro de su Votación?',
                           text: "Luego de hacer click en el boton Si no podra revertir la nota!",
                           type: 'warning',
                           showCancelButton: true,
                           confirmButtonColor: '#3085d6',
                           cancelButtonColor: '#d33',
                           confirmButtonText: 'Si, votar!'
                           }).then((result) => {
                             if (result.value) {

                              $('.servicios').each(function(index, value) {
                                    valor = this.value;
                                    array_services.push(
                                           {
                                               nombre_servicio:$(this).attr('data-nombre'), 
                                                valor_servicio_evaluado: this.value
                                             });
                                       
                              });  


                               $.ajax({
                                 headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 },
                                 type: "POST",
                                 url: '{{url("admin/calificar/rating")}}',
                                 data: {
                                       escort_id :          $('#escort_id').val(),
                                       valor_nota:          average_final,
                                       comentario_user:     $('#comentarios_user').val(),
                                       llamada_escort:      $('#eleccion_llamada').val(),
                                       lugar_atencion_escort:  $('#eleccion_lugar_atencion').val(),
                                       presentacion_escort:   $('#eleccion_present_personal').val(),
                                       rostro_escort         : $('#eleccion_rostro').val(),
                                       busto_escort          :  $('#eleccion_busto').val(),
                                       trasero_escort        :  $('#eleccion_trasero').val(),
                                       arrayServices         : array_services
                                       // besos_escort          :  $('#eleccion_besos').val(),
                                       // quejido_escort        :  $('#eleccion_quejidos').val(),
                                       // mov_pelvicos_escort   :  $('#eleccion_mov_pelvicos').val(),
                                       // sexo_oral_escort      :  $('#eleccion_sexo_oral').val(),
                                       // sexo_vaginal_escort   :  $('#eleccion_sexo_vaginal').val(),
                                       // sexo_anal_escort       :  $('#eleccion_sexo_anal').val()
                                       
                                    },
                                 success: function (data) {
                                  console.log(data.nota_final);
                                    if (data.message == 1)
                                    {
                                       $('#promedio_final').html(data.nota_final + '/ 10');

                                       Swal.fire(
                                          'Felicitaciones!',
                                          'Has Calificado Exitosamente a la Escort..!',
                                          'success'
                                          )
                                         
                                          jQuery("#btnCalificar").modal("hide");
                                          
                                          $('#myBtn').hide(); 
                                          location.reload();
                                        
                                     } else {
                                       alert("ha ocurrido un error");
                                     }
                                 },
                                    error: function (request, status, error) {
                                       alert(request.responseText);
                                    }
                                })
                             }
                           })
                    }
               });


               //modal de calificaciones
                 
               $(".btnAdd").click(function(){
                     //alert("modal");
                     $("#tbcomentariosUsuarios tbody").empty();
                    //$("#tbcomentariosUsuarios").html();
                    
                         $.ajax({
                                 headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                 },
                                 type: "POST",
                                 url: '{{url("admin/calificacion/total_escort")}}',
                                 data: {
                                       escort_id : $('#escort_id').val(),
                                    },
                                   success: function (data) {
                                    console.log(data);
                                  //  console.log("comentarios:" + data.comentarios);
                                  //$("#tbcomentariosUsuarios").append("<tr><th>Fecha</th><th>Usuario</th><th>Nota</th><th>Comentario</th></tr>");
                                 //  console.log(data.contador);
                                    if ((data.message == 1) &&  (data.data.length > 0))
                                    {
                                       $("#tbcomentariosUsuarios").append("<tr><th>Fecha</th><th>Usuario</th><th>Nota</th><th>Comentario</th></tr>");

                                       $.each(data.comentarios, function(index, value) {
                                           console.log("iduser:" + data.comentarios[index].id_user);
                                         $("#tbcomentariosUsuarios").append(
                                           "<tr><td>" + data.comentarios[index].fecha_calificacion + "</td>" +
                                           " <td>" + data.comentarios[index].name + "</td>" +
                                           " <td>" + data.comentarios[index].rating_total + "</td>" +
                                           " <td>" + "<input type='button' class='btn btn-default' data-toggle='collapse' data-target='#collapseme_"+data.comentarios[index].id_user+"' value='Ver Comentario' />" + "</td>" +
                                           "</tr>"+
                                           "<tr id='collapseme_"+data.comentarios[index].id_user+"' class='collapse out'><td><div><span class='text-center'>"+ data.comentarios[index].comentario +"</span></div></td></tr>");
                                         
                                          });
                                             

                                       $('#llamada').html(parseInt(data.data[0]['llamada']/data.contador));
                                       $('#lugar_atencion').html(parseInt(data.data[0]['lugar_atencion']/data.contador));
                                       $('#present_personal').html(parseInt(data.data[0]['presentacion_personal']/data.contador));
                                       $('#rostro').html(parseInt(data.data[0]['rostro']/data.contador));
                                       $('#busto').html(parseInt(data.data[0]['busto']/data.contador));
                                       $('#trasero').html(parseInt(data.data[0]['trasero']/data.contador));
                                       $('#besos').html(parseInt(data.data[0]['besos']/data.contador));
                                       $('#quejidos').html(parseInt(data.data[0]['quejidos']/data.contador));
                                       $('#mov_pelvicos').html(parseInt(data.data[0]['mov_pelvicos']/data.contador));
                                       $('#sexo_oral').html(parseInt(data.data[0]['sexo_oral']/data.contador));
                                       $('#sexo_vaginal').html(parseInt(data.data[0]['sexo_vaginal']/data.contador));
                                       $('#sexo_anal').html(parseInt(data.data[0]['sexo_anal']/data.contador));
                                        
                                     } else {
                                         console.log("datos vacios");
                                       //alert("ha ocurrido un error");
                                     }
                                 },
                                    error: function (request, status, error) {
                                       alert(request.responseText);
                                    }
                                })
                      });

                              

    
    });

    
</script>
