@extends('admin.layout')
@section('css')
@endsection
@section('content')
<div>

<div id="container">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
 
   @if ($nombre_region == null) 
   <div style="margin-top:10px;margin-left:10px;"> 
      <a href="{{ route('inicio')}}" class="btn btn-danger" >
      <i class="glyphicon glyphicon-plus"></i>
      <span style="font-size:12px;">Ubicación: Todas las Escorts</span>
      </a>
   </div>
   @else
   <div style="margin-top:10px;margin-left:10px;">
      <a href="{{ route('buscar_todas') }}" class="btn btn-danger" >
      <i class="glyphicon glyphicon-plus"></i>
      <span style="font-size:12px;">
      Ubicación: {{ $nombre_region }}
      </span>
      </a>
      @endif
   </div>
   <hr>
   <div id="demo"  style="color:#ffff;">
      @csrf
      @if (($vista == 'Escort'))
      @include('admin.clientes.acciones_escort')
      @elseif (($vista == 'ADMIN') AND (auth()->user()->hasRole('Admin')))
      @include('admin.partials.admin_user')
      @elseif ((auth()->user()->hasRole('USUARIO REGISTRADO')) OR (auth()->user()->hasRole('Admin')))
      <div class="row" style="margin-left:1px">
         <div class="col-sm-2 text-center">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Apariencias Fisicas</button>
            <ul class="dropdown-menu">
               <li>
                  <a href="#" class="small" data-value="Delgada" tabIndex="-1">
                  <input type="checkbox" name="checkFilters[]" id="checkbox_Delgada" value="Delgada" />&nbsp;Delgada</a>
               </li>
               <li><a href="#" class="small" data-value="Normal" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]" id="checkbox_Normal"  value="Normal"/>&nbsp;Normal</a>
               </li>
               <li><a href="#" class="small" data-value="Culona" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]" id="checkbox_Culona" value="Culona"/>&nbsp;Culona</a>
               </li>
               <li><a href="#" class="small" data-value="Tetona" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]" id="checkbox_Tetona" value="Tetona"/>&nbsp;Tetona</a>
               </li>
               <li><a href="#" class="small" data-value="Rellena" tabIndex="-1">
                  <input type="checkbox" name="checkFilters[]" id="checkbox_Rellena" value="Rellena"/>&nbsp;Rellena</a>
               </li>
            </ul>
         </div>
         <div class="col-sm-2 text-center">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Servicios</button>
            <ul class="dropdown-menu">
               @foreach($tipo_servicios as $tipo)
               <li><a href="#" class="small" data-value="{!! $tipo->nombre_servicio !!}" tabIndex="-1">
                  <input type="checkbox" value="{!! $tipo->nombre_servicio !!}"   data-filter="Servicios"   id="checkbox_{!! $tipo->nombre_servicio !!}" name="checkFilters[]" />&nbsp;{!! $tipo->nombre_servicio !!}
                  </a>
               </li>
               @endforeach
            </ul>
         </div>
         <div class="col-sm-2 text-center">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Color de Piel</button>
            <ul class="dropdown-menu">
               <li><a href="#" class="small" data-value="Blanca" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]"  id="checkbox_Blanca" value="Blanca" />&nbsp;Blanca</a>
               </li>
               <li><a href="#" class="small" data-value="Morena" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]"  id="checkbox_Morena" value="Morena" />&nbsp;Morena</a>
               </li>
               <li><a href="#" class="small" data-value="Rubia"  tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]" id="checkbox_Rubia" value="Rubia" />&nbsp;Rubia</a>
               </li>
               <li><a href="#" class="small" data-value="Negra" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]" id="checkbox_Negra" value="Negra"/>&nbsp;Negra</a>
               </li>
               <li><a href="#" class="small" data-value="Triguena" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]" id="checkbox_Triguena" value="Triguena"/>&nbsp;Trigueña</a>
               </li>
            </ul>
         </div>
         <div class="col-sm-2 text-center">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Color de Cabello</button>
            <ul class="dropdown-menu">
               <li><a href="#" class="small" data-value="Negro" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]" id="checkbox_Negro" value="Negro"/>&nbsp;Negro</a>
               </li>
               <li><a href="#" class="small" data-value="Peliroja" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]" id="checkbox_Peliroja" value="Peliroja"/>&nbsp;Peliroja</a>
               </li>
               <li><a href="#" class="small" data-value="Rubio" tabIndex="-1">
                  <input type="checkbox" name="checkFilters[]" id="checkbox_Rubio" value="Rubio"/>&nbsp;Rubio</a>
               </li>
               <li><a href="#" class="small" data-value="Castaño" tabIndex="-1">
                  <input type="checkbox" name="checkFilters[]"  id="checkbox_Castano" value="Castano"/>&nbsp;Castaño</a>
               </li>
            </ul>
         </div>
         <div class="col-sm-1 text-center">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Estatura</button>
            <ul class="dropdown-menu">
               <li><a href="#" class="small" data-value="Menos de 1.60" tabIndex="-1">
                  <input type="checkbox" id="checkbox_1.60" value="1.60" />&nbsp;Menos de 1.60 mts</a>
               </li>
               <li><a href="#" class="small" data-value="1.60 a 1.65" tabIndex="-1">
                  <input type="checkbox" id="checkbox_1.65" value="1.65" />&nbsp;1.60 a 1.65 mts</a>
               </li>
               <li><a href="#" class="small" data-value="1.70 a 1.75" tabIndex="-1">
                  <input type="checkbox" id="checkbox_1.70" />&nbsp;1.70 a 1.75 mts</a>
               </li>
               <li><a href="#" class="small" data-value="Más de 1.75" tabIndex="-1">
                  <input type="checkbox" id="checkbox_1.75"/>&nbsp;Más de 1.75 mts</a>
               </li>
            </ul>
         </div>
         <div class="col-sm-1 text-center">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" style="position: relative;left:35px;" data-toggle="dropdown" value="Apariencia Fisicas">Edad</button>
            <ul class="dropdown-menu">
               <li><a href="#" class="small" data-value="18,21"  tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]"  data-filter="Edad" value="18-21" />&nbsp;18 a 21 </a>
               </li>
               <li><a href="#" class="small" data-value="21,25"  tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]"   data-filter="Edad" value="21-25"/>&nbsp;21 a 25 </a>
               </li>
               <li><a href="#" class="small" data-value="25,30" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]"  data-filter="Edad" value="25-30" />&nbsp;25 a 30 </a>
               </li>
               <li><a href="#" class="small" data-value="31,60" tabIndex="-1">
                  <input type="checkbox"  name="checkFilters[]"  data-filter="Edad" value="31-60" />&nbsp;Mayor de 30
                  </a>
               </li>
            </ul>
         </div>
         <div class="col-sm-2 text-center">
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Precio</button>
            <ul class="dropdown-menu">
               <li><a href="#" class="small" data-value="20.000 a 40.000" tabIndex="-1">
                  <input type="checkbox" name="checkFilters[]" data-filter="Precio" value="20000-40000" />&nbsp; $20.000 a $40.000 </a>
               </li>
               <li><a href="#" class="small" data-value="45.000 a 60.000" tabIndex="-1">
                  <input type="checkbox" name="checkFilters[]" data-filter="Precio" value="45000-60000" />&nbsp; $45.000 a $60.000 
                  </a>
               </li>
               <li><a href="#" class="small" data-value="60.000 a 80.000" tabIndex="-1">
                  <input type="checkbox" name="checkFilters[]" data-filter="Precio" value="60000-80000" />&nbsp;$60.000 a $80.000 
                  </a>
               </li>
               <li><a href="#" class="small" data-value="Mayor de 80.000" tabIndex="-1">
                  <input type="checkbox" name="checkFilters[]" data-filter="Precio" value="80000-1000000" />&nbsp;Mayor de  $80.000</a>
               </li>
            </ul>
         </div>
      </div>
     
      <hr>
      <!--Div para mostrar boton de las escorts !-->
      <div class="divbutton" id="buttonFilter"></div>
      <br>
   
      <div class="row imagetiles" id="resultadoFilter"></div>
            <div class="imagetiles imgshow" id="divEscorts">
               @if (!empty(($listEscort)))
               <div class="row">
                  @foreach($listEscort as $row)
                  <div class="col-md-3">
                     <div class="thumbnail">
                        <a href="admin/escort_private_profile/{{ $row->id }}">
                           <img src="{{ url('uploads/escort_fotos/'.$row->foto_principal) }}" alt="Lights" style="width:100%">
                           <div class="caption">
                              <p class="text-muted text-center" style="margin-bottom:0px;">{{ strtoupper($row->apodo_escort)}}</p>
                              <p class="text-muted text-center" style="margin-bottom:0px;">{{ $row->telefono}}</p>
                              <p class="text-muted text-center" style="margin-bottom:0px;">{{ $row->descripcion_comuna}}</p>
                           </div>
                        </a>
                     </div>
                  </div>
                  @endforeach
               </div>
               @endif
            </div>
            @endif
         </div>

</div>

@endsection
<script src="{{url('js/jquery-2.1.4.min.js') }}"></script>
<script src='{{ url("adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js") }}'></script>
<script src='{{ url("adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}'></script>
<script src='{{url("adminlte/bower_components/select2/dist/js/select2.full.min.js") }}'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
{!! Html::script('assets/dist/js/dropzone.js'); !!}

<script>
   $j=jQuery.noConflict();
   $j(document).ready(function () {
           
      $j(function () {
         $j('#cliente-table').DataTable({
                 'paging'      : true,
                 'lengthChange': false,
                 'searching'   : true,
                 'ordering'    : true,
                 'info'        : true,
                 'autoWidth'   : true,
                 "language": {
                     "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                  }
               })
         });
   
      $j(document).on('click', '.dropdown-menu-button', function (e) {
                      e.stopPropagation()
               });
        
   
               // $j('#show-my-albums-button').click(function(){
               //    $.albumize();
               // });
               
               //Subir imagen del perfil automaticamente
               $j("#upfile1").click(function () {
                  $j("#file1").trigger('click');
               
                  });
   
         // $j("#telefono_escort").inputmask('9999-999-9999');
         // $j('#horario_escort').inputmask("9{1,2}:99 aa - 9{1,2}:99 aa");
         // $j('.select2').select2();
         // $j("#precio_escort").inputmask('Regex', {regex: "^[0-9]{1,6}(\\,\\d{1,2})?$"});
   
   
         // $j('#altura_escort').inputmask('9,99' );
         // $j('#medida_escort').inputmask('99-99-99');
    
         // //Timepicker
         // $j('.timepicker').timepicker({
         //    showInputs: false
         // })
   
        //actualizar informacion de la escort
        $j('#btn_actualizar').on('click', function(e) {
              e.preventDefault();
   
               var data = $("#frm_dataEscort").serialize();
              $.ajax({
                  type: "post",
                  url: "/admin/updateEscort_info",
                  data: data,
                  dataType: "json",
                  success: function(data) {
                      //console.log('success');
                      if(data.success == 1) {
                          $('#ajax-alert').html('Perfil Actualizado Exitosamente').show().delay(3000).fadeOut();
                          location.reload();
                      }
                  },
                  error: function(error) {
                      console.log('error');
                  }
                });
   
             });
   
                //actualizar combo de regiones y comuna
           //para refrescar el combo de factores reporte 5
           $j('select[name="region_escort"]').on('change', function() {
              var stateID = $(this).val();
              $j('select[name="comuna_escort"]').empty();
           //   alert('stateid:'+ stateID);
   
            if(stateID) {
                  $.ajax({
                     // url: '/admin/updatecomuna/'+stateID,
                     url: '/admin/actualizarcomuna/'+stateID,
                      type: "GET",
                      dataType: "json",
                      success:function(data) {
   
                       $.each(data.comuna, function(i, comuna){
                          //do something
                          //console.log(comuna.nombre);
                          $('select[name="comuna_escort"]').append('<option value="'+ comuna.id +'">'+ comuna.nombre+'</option>');
                       });
   
   
                       //   $('select[name="comuna_escort"]').empty();
                       if(data == ""){
                              $('select[name="comuna_escort"]').append('<option value="0">'+'«« No hay Comunas »»'+'</option>');
                               
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
   
   
         //subir fotos 
         Dropzone.options.myDropzone = {
                autoProcessQueue: false,
                uploadMultiple: true,
                maxFilezise: 10,
                maxFiles: 8,
            
                init: function() {
                    var submitBtn = document.querySelector("#submit");
                    myDropzone = this;
                    
                    submitBtn.addEventListener("click", function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        myDropzone.processQueue();
   
                    });
                    this.on("addedfile", function(file) {
                       // alert("file uploaded");
   
                    });
                    
                    this.on("complete", function(file) {
                       location.reload(true);
                        myDropzone.removeFile(file);
                    });
     
                    this.on("success", 
                        myDropzone.processQueue.bind(myDropzone)
                    );
                }
            };
   
   
   
      
            $j('input[name="checkFilters[]"]').on('change', function (e) {
   
            e.preventDefault();
            apariencia_select = []; // reset
            filterWrapper = $('#resultadoFilter');
            buttonWrapper = $('#buttonFilter');
            var filter = $(this).attr("data-filter");
            
             
            $j('input[name="checkFilters[]"]:checked').each(function() {
                  
                   
                     apariencia_select.push($(this).val());
                     //alert('check_seleccionado:' + apariencia_select);
                     //console.log(apariencia_select);
                    
               
            });
   
            $.ajax({
                
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
             data:  {
               "opciones" : apariencia_select,
                     "filtro": "showFiltros",
                     "filter": filter
             }, 
              url:   '/filter_SelectMenu',
              type:  'POST',
                    dataType: "json",
              success:  function (data) {
                    
                      if (data.success == true) {
                         $('#divEscorts').empty();
                         $('#images_escorts').empty();
                         $('#resultadoFilter').empty();
                         $('#buttonFilter').empty();
   
                         //$('#btnFilter').html(apariencia_select + "<i class='glyphicon glyphicon-remove'></i>");
                   
                           console.log(data);
                         
                           //console.log(data.resultados[0].foto_principal);
                           filterWrapper.html();
                           buttonWrapper.html();
                          //alert(data.resultados[0].apodo_escort)
                           
                              for (var i = 0, j = data.resultados.length; i < j; i++){
                             
                                 //$(buttonWrapper).append('<li><a href="#">'+ apariencia_select[i] +'</a></li>');
                                 if(i==0 || i%4 == 0)
                                 {
                                  //  $("#buttonFilter").html(apariencia_select +  ' ' + "<i class='glyphicon glyphicon-remove'></i>");
                                    //var showFilter =  $('#btnFilter').html(apariencia_select +  ' ' + "<i class='glyphicon glyphicon-remove'></i>");
                                   var showFilter = $("<div class='row'></div>").appendTo(buttonWrapper);
                                    
                                    
                                    var appendEl = $("<div class='row' style='padding-top:5px;'></div>").appendTo(filterWrapper);
                                 } 
                                  if (apariencia_select[i] != undefined) {
                                     // alert("data-filter:" + filter );
                                      if (filter == "Precio") {
                                          $("</div><div class='col-md-3 col-sm-3 col-xs-3' style='width:10%;margin-left:20px;'><button type='button' class='btn btn-danger btnRemoveCheckbox' data-filterx = "+filter+" id='button_"+apariencia_select[i]+"' data-value="+apariencia_select[i] + " >"+ apariencia_select[i] + " " + "<i class='glyphicon glyphicon-remove'></i></button></div>").appendTo(showFilter);
                                      } else {
                                       $("</div><div class='col-md-3 col-sm-3 col-xs-3' style='width:7%;margin-left:20px;'><button type='button' class='btn btn-danger btnRemoveCheckbox'   data-filterx = "+filter+" id='button_"+apariencia_select[i]+"' data-value="+apariencia_select[i] + " >"+ apariencia_select[i] + " " + "<i class='glyphicon glyphicon-remove'></i></button></div>").appendTo(showFilter);
                                      }
                                  }
                                    $("</div><div class='col-md-3 col-sm-3 col-xs-3'><a href=escort_perfil/"+ data.resultados[i].id +"><img src=uploads/escort_fotos/"+ data.resultados[i].foto_principal  + " data-id="+i+" class='img-responsive img-thumbnail'></a></div>").appendTo(appendEl);
                                    
                                
                               }
                               
                              //  $('input[name="checkFilters[]"]').each(function() {
                              //    if (this.checked) {
                              //          $(this).prop("checked", false);
                              //             console.log($(this).val()); 
                              //       }
   
                              //  });
   
                          //    console.log(data);
                 } else {
                           $('#divEscorts').empty();
                           $('#images_escorts').empty();
                           $('#resultadoFilter').empty();
                         return false;
                       }
   
   
                    }
   
   
            });
            
            }); 
   
           
   
            //eliminar checkbox seleccionados.
            $j(document).on('click','.btnRemoveCheckbox',function(e){
               var valor_seleccionado = $(this).attr("data-value");
               var opc_remove =  $(this).attr("data-filterx");
               e.preventDefault();
               
               checkbox_select = [];
               
                $('input[name="checkFilters[]"]:checked').each(function() {
                     if ($(this).val() == valor_seleccionado) {
                        $('#checkbox_'+ valor_seleccionado).attr('checked', false);
                        $("#button_"+ valor_seleccionado).hide();
                     } else {
   
                        checkbox_select.push($(this).val());
                     }
   
   
               });
               console.log("valor:" +  checkbox_select);
              
               $.ajax({
                
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                    data:  {
                      "opciones" : checkbox_select,
                      "filtro": 'remover_filtro',
                      "filter": opc_remove
                    }, 
                     url:   '/filter_SelectMenu',
                     type:  'POST',
                     dataType: "json",
                     success:  function (data) {
                     
                       if (data.success == true) {
                          $('#divEscorts').empty();
                          $('#images_escorts').empty();
                          $('#resultadoFilter').empty();
                          //$('#buttonFilter').empty();
   
                            console.log(data);
                            //console.log(data.resultados[0].foto_principal);
                            filterWrapper.html();
                            buttonWrapper.html();
                           //alert(data.resultados[0].apodo_escort)
                            
                               for (var i = 0, j = data.resultados.length; i < j; i++){
                              
                                  if(i==0 || i%4 == 0)
                                  {
                                     
                                     var appendEl = $("<div class='row'></div>").appendTo(filterWrapper);
                                  } 
                                     
                                     
                                     $("</div><div class='col-md-3 col-sm-3 col-xs-3'><a href=escort_perfil/"+ data.resultados[i].id +"><img src=uploads/escort_fotos/"+ data.resultados[i].foto_principal  + " data-id="+i+" class='img-responsive img-thumbnail'></a></div>").appendTo(appendEl);
                                     
                                 
                                }
                         
   
                              // console.log(data);
                        } else {
                            $('#divEscorts').empty();
                            $('#images_escorts').empty();
                            $('#resultadoFilter').empty();
                          return false;
                        }
   
   
                     }
   
   
                   });
            });
   
              
              $('.select2').select2();
   
   
   }); 
</script>