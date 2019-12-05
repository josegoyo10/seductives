@extends('admin.layout')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-4">
         <div class="text-center">
            <h2 class="text-center">{{ $data->apodo_escort }} </h2>
            <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}"  class="rounded" alt="">
         </div>
         <br>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-4" style="color:#FFFFFF;">Edad: {{ $data->edad }} años</div>
            <div class="col-md-8" style="color:#FFFFFF;">Whatsapp: 
               <a href="https://api.whatsapp.com/send?phone={{ str_replace('+', '', $telefono_whatsapp)}}&text=Hola he visto tu perfil y quiero que nos juntemos." 
                  class="btn btn-success" target="_blank">
               <i class="fa fa-whatsapp" aria-hidden="true"></i>
               </a>                 
            </div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">Ubicación:  {{ $data->descripcion_region }}, {{ $data->descripcion_comuna  }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-4" style="color:#FFFFFF;">Altura:  {{ $data->altura }}</div>
            <div class="col-md-7" style="color:#FFFFFF;">Médidas: {{ $data->medidas }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-6" style="color:#FFFFFF;">Atención:  {{ $data->atencion }}</div>
            <div class="col-md-6" style="color:#FFFFFF;">Teléfono: {{ str_replace('+56', '', $telefono_escort) }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">Días Disponible:  {{ $data->dias_disponibles }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:0px;">
            <div class="col-md-5" style="color:#FFFFFF;">Precio:  {{ $precio_escort }}</div>
            <div class="col-md-6" style="color:#FFFFFF;">Color de Piel:  &nbsp;{{ $data->color_piel }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">
               Servicios:
               <br>
               @foreach ($servicio_escort as $row)
               <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check-square"></i></span>{{ $row->nombre_servicio }}</li>
               </ul>
               @endforeach
               <!-- @php
                  $array_services[] = ucfirst($row->nombre_servicio);
                  @endphp
                  
                  @if (isset($array_services))
                  
                  
                  {{   implode(',', $array_services)  }}
                  @endif -->
            </div>
            <hr> 
            <div class="row" style="margin-left:2px;">
               <div class="col-md-12" style="color:#FFFFFF;">
             
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
                  <button type="button" class="btn btn-danger btn-md btnAdd" data-toggle="modal" 
                     data-target="#myModal">
                  Calificaciones
                  </button>
               </div>
            </div>
            <hr>
            <div class="row" style="margin-left:2px;">
               <div class="col-md-12" style="color:#FFFFFF;">
                  @if ($sql_rating_escort == null)
                           <!-- Button trigger modal -->
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                           Calificar Escort
                           </button>
                           <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                 Launch demo modal
                              </button>



                           @endif
               </div>
            </div>
         </div>
         <hr>
      </div>
      <div class="col-sm-5" style="margin-left:60px; padding-top:40px;">
         <div class="panel panel-default">
            <div class="panel-heading">Sobre Mi</div>
            <div class="panel-body">
               <p>{{ $data->descripcion }}</p>
            </div>
         </div>
         <div class="panel panel-default">
            <div class="panel-heading">Comentarios</div>
            <div class="panel-body">
               <p>{{ $data->descripcion }}</p>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row" style="margin-left:0px;">
   <div class="col-xs-3" >
      <div class="thumbnail">
         <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}">
            <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}"  alt=""  style="width:100%;">
            </a>
         </figure>
      </div>
   </div>
   <div class="col-xs-3">
      <div class="thumbnail">
         <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_1) }}">
            <img src="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_1) }}"  alt=""  style="width:100%;">
            </a>
         </figure>
      </div>
   </div>
   <div class="col-xs-3">
      <div class="thumbnail">
         <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_2) }}">
            <img src="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_2) }}"  alt=""  
               style="width:100%">
            </a>
         </figure>
      </div>
   </div>
   <br>
</div>
<!--row !-->  
</div>
<!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>












<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                     @foreach($servicio_escort as $tipo)
                     <br>
                     <span style="font-size:14px">{!! $tipo->nombre_servicio !!}</span>
                     <div id="{!! $tipo->nombre_servicio !!}" data-id="{!! $tipo->nombre_servicio !!}"></div>
                     <select class="form-control options servicios" data-nombre = "{!! $tipo->nombre_servicio !!}"
                        id="eleccion_{!! $tipo->nombre_servicio !!}">
                        <option value="0">«« NO APLICA »»</option>
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
                  <input type="hidden" id="escort_id" value="{!! $data->id !!}" />
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
<!-------------------------------------------MODAL PARA CALIFICAR---------------------------------------------------------------- !-->






<!---------------------- Modal de Calificaciones Realizadas ------------------------>
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
                                       <p class="text-center"><b>Llamada:</b></p>
                                       <b>
                                          <p  id='llamada_evaluada' class="text-center"  style="color:black;" data-id="llamada"></p>
                                       </b>
                                    </td>
                                    <td>
                                       <p class="text-center"><b>Lugar de Atención: </b></p>
                                       <b>
                                          <p  class="text-center" id='lugar_atencion_evaluada' data-id="lugar_atencion"></p>
                                       </b>
                                    </td>
                                    <td>
                                       <p class="text-center"><b>Presentación:</b></p>
                                       <b>
                                          <p  class="text-center" id='present_personal_evaluada' data-id="present_personal"></p>
                                       </b>
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
                                       <p class="text-center"><b>Rostro: </b></p>
                                       <b>
                                          <p  class="text-center" id='rostro_evaluada' data-id="rostro"></p>
                                       </b>
                                    </td>
                                    <td>
                                       <p   class="text-center"><b>Busto:</b></p>
                                       <b>
                                          <p   class="text-center"  id='busto_evaluada' data-id="busto"></p>
                                       </b>
                                    </td>
                                    <td>
                                       <p class="text-center"><b>Trasero:</b></p>
                                       <b>
                                          <p class="text-center" id='trasero_evaluada' data-id="trasero"></p>
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
                                       <p class="text"><b>Nota Final:</b> <b><span id="final_note"></span></b></p>
                                    </td>
                                 </tr>
                                 </tr>
                           </table>
                        </div>
                        <!--fin 1 !-->
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
                        </div>
                        <!--fin 2 !-->
                     </div>
                     <!--fin row !-->
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
         <!---------------------- Modal de Calificaciones Realizadas ------------------------>
      </div>
   </div>
</div>
</div>
@endsection
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="{{asset('js/albery.js')}}"></script>
<script src="{{asset('js/sweetalert2.all.min.js') }}"></script>
<script src='{{url("js/ekko-lightbox.js") }}'></script>
<script src='{{url("js/jquery-ui.js") }}'></script>
<script src="{{asset('js/touchTouch.jquery.js') }}"></script>
<script>
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
     
   
       $(document).ready(function( $ ) {
   
         $(window).load(function() {
         // Initialize the gallery
         $('.thumbnail figure a').touchTouch();
         });
   
   
            $('#nota_final').val('');
   
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                           event.preventDefault();
                           $(this).ekkoLightbox();
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
              var acum = 0;           
   
              $(".options").each(function() {
                 if ($(this).val() == "0") {
                  acum+=1;
                    
                 }
             });
   
   
   
              var average_final = (valor_nota/(contador_servicios -  acum)).toFixed(2);
              console.log("averge final:" + average_final);
              //alert("average:"+ average_final);
              var cont =0;
              var array_services = [];
              //$(this).attr('data-nombre')
              var isValid = true;
              $(".options").each(function() {
                 $(".error").html();
                 if ($(this).val() == " ") {
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
                                comentario_user:       $('#comentarios_user').val(),
                                llamada_escort:        $('#eleccion_llamada').val(),
                                lugar_atencion_escort:  $('#eleccion_lugar_atencion').val(),
                                presentacion_escort:    $('#eleccion_present_personal').val(),
                                rostro_escort         : $('#eleccion_rostro').val(),
                                busto_escort          :  $('#eleccion_busto').val(),
                                trasero_escort        :  $('#eleccion_trasero').val(),
                                arrayServices         : array_services
                                
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
                                   
                                 //   $('#myBtn').hide(); 
                                 //   location.reload();
                                 
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
   
                             $('#final_note').html(data.nota_final); 
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
                                      
                                
                                $('#llamada_evaluada').html(parseInt(data.data[0]['llamada']/data.contador));
                                $('#lugar_atencion_evaluada').html(parseInt(data.data[0]['lugar_atencion']/data.contador));
                                $('#present_personal_evaluada').html(parseInt(data.data[0]['presentacion_personal']/data.contador));
                                $('#rostro_evaluada').html(parseInt(data.data[0]['rostro']/data.contador));
                                $('#busto_evaluada').html(parseInt(data.data[0]['busto']/data.contador));
                                $('#trasero_evaluada').html(parseInt(data.data[0]['trasero']/data.contador));
                                 
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
</body>