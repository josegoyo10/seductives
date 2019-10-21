<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href='<?php echo e(url("css/estilos.css")); ?>'>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="global indent">
   <!--content-->
   <div class="container">
     <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
     
     <!--h2 data-toggle="collapse" data-target="#demo" style="cursor:pointer;"!-->  
        <span class="glyphicon glyphicon-plus"></span>
          <!--&nbsp; <?php echo ($nombre_region == null ? 'Todas las Escorts' : $nombre_region ); ?> !-->
         <?php if($nombre_region == null): ?>   
           <div><a href="<?php echo e(route('inicio')); ?>" class="btn btn-danger" >
               <i class="glyphicon glyphicon-plus"></i>
               <span style="font-size:12px;">Ubicación: Todas las Escorts</span>
              </a>
            </div>
         <?php else: ?>
          <a href="<?php echo e(route('buscar_todas')); ?>" class="btn btn-danger" >
          <i class="glyphicon glyphicon-plus"></i>
               <span style="font-size:12px;">
               Ubicación: <?php echo e($nombre_region); ?>

            </span>
          </a>
         <?php endif; ?>
      <br>
      <hr>
      <div id="demo"  style="color:#ffff;">
         <?php echo csrf_field(); ?>
         <div class="row">
            <div class="col-sm-2">
            
               <div class="row">
                  <div class="col-lg-12">
                     <div class="button-group">
                    
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Apariencias Fisicas</button>
                        <ul class="dropdown-menu">
                           <li>
                            <a href="#" class="small" data-value="Delgada" tabIndex="-1">
                             <input type="checkbox" name="checkFilters[]" id="checkbox_Delgada" value="Delgada" />&nbsp;Delgada</a>
                           </li>
                           <li><a href="#" class="small" data-value="Normal" tabIndex="-1">
                            <input type="checkbox"  name="checkFilters[]" id="checkbox_Normal"  value="Normal"/>&nbsp;Normal</a></li>
                           <li><a href="#" class="small" data-value="Culona" tabIndex="-1">
                           <input type="checkbox"  name="checkFilters[]" id="checkbox_Culona" value="Culona"/>&nbsp;Culona</a></li>
                           <li><a href="#" class="small" data-value="Tetona" tabIndex="-1">
                             <input type="checkbox"  name="checkFilters[]" id="checkbox_Tetona" value="Tetona"/>&nbsp;Tetona</a></li>
                           <li><a href="#" class="small" data-value="Rellena" tabIndex="-1">
                           <input type="checkbox" name="checkFilters[]" id="checkbox_Rellena" value="Rellena"/>&nbsp;Rellena</a></li>
                          
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-2">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="button-group">
                    
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Servicios</button>
                        <ul class="dropdown-menu">
                          <?php $__currentLoopData = $tipo_servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li><a href="#" class="small" data-value="<?php echo $tipo->nombre_servicio; ?>" tabIndex="-1">
                                  <input type="checkbox" value="<?php echo $tipo->nombre_servicio; ?>"   data-filter="Servicios"   id="checkbox_<?php echo $tipo->nombre_servicio; ?>" name="checkFilters[]" />&nbsp;<?php echo $tipo->nombre_servicio; ?>

                              </a>
                           </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-2">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="button-group">
                     <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Color de Piel</button>
                        <ul class="dropdown-menu">
                           <li><a href="#" class="small" data-value="Blanca" tabIndex="-1">
                           <input type="checkbox"  name="checkFilters[]"  id="checkbox_Blanca" value="Blanca" />&nbsp;Blanca</a></li>
                           <li><a href="#" class="small" data-value="Morena" tabIndex="-1">
                           <input type="checkbox"  name="checkFilters[]"  id="checkbox_Morena" value="Morena" />&nbsp;Morena</a></li>
                           <li><a href="#" class="small" data-value="Rubia"  tabIndex="-1">
                             <input type="checkbox"  name="checkFilters[]" id="checkbox_Rubia" value="Rubia" />&nbsp;Rubia</a></li>
                           <li><a href="#" class="small" data-value="Negra" tabIndex="-1">
                              <input type="checkbox"  name="checkFilters[]" id="checkbox_Negra" value="Negra"/>&nbsp;Negra</a></li>
                           <li><a href="#" class="small" data-value="Triguena" tabIndex="-1">
                              <input type="checkbox"  name="checkFilters[]" id="checkbox_Triguena" value="Triguena"/>&nbsp;Trigueña</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-2">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="button-group">
                     <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Color de Cabello</button>
                        <ul class="dropdown-menu">
                           <li><a href="#" class="small" data-value="Negro" tabIndex="-1">
                              <input type="checkbox"  name="checkFilters[]" id="checkbox_Negro" value="Negro"/>&nbsp;Negro</a></li>
                           <li><a href="#" class="small" data-value="Peliroja" tabIndex="-1">
                              <input type="checkbox"  name="checkFilters[]" id="checkbox_Peliroja" value="Peliroja"/>&nbsp;Peliroja</a></li>
                           <li><a href="#" class="small" data-value="Rubio" tabIndex="-1">
                              <input type="checkbox" name="checkFilters[]" id="checkbox_Rubio" value="Rubio"/>&nbsp;Rubio</a></li>
                           <li><a href="#" class="small" data-value="Castaño" tabIndex="-1">
                             <input type="checkbox" name="checkFilters[]"  id="checkbox_Castano" value="Castano"/>&nbsp;Castaño</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-1">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="button-group">
                     <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Estatura</button>
                        <ul class="dropdown-menu">
                           <li><a href="#" class="small" data-value="Menos de 1.60" tabIndex="-1">
                             <input type="checkbox" id="checkbox_1.60" value="1.60" />&nbsp;Menos de 1.60 mts</a></li>
                           <li><a href="#" class="small" data-value="1.60 a 1.65" tabIndex="-1">
                               <input type="checkbox" id="checkbox_1.65" value="1.65" />&nbsp;1.60 a 1.65 mts</a></li>
                           <li><a href="#" class="small" data-value="1.70 a 1.75" tabIndex="-1">
                               <input type="checkbox" id="checkbox_1.70" />&nbsp;1.70 a 1.75 mts</a></li>
                           <li><a href="#" class="small" data-value="Más de 1.75" tabIndex="-1">
                              <input type="checkbox" id="checkbox_1.75"/>&nbsp;Más de 1.75 mts</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-1">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="button-group">
                     <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Edad</button>
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
                  </div>
               </div>
            </div>

            <div class="col-sm-2">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="button-group">
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
               </div>
            </div>

         </div>
      </div>
      <hr>
        <!--Div para mostrar boton de las escorts !-->
        <div class="divbutton" id="buttonFilter"></div>
      <br>
      <!--Div para mostrar fotos de las escorts !-->
      <div class="row imagetiles" id="resultadoFilter"></div>

     
      <div class="row imagetiles" id="divEscorts">
 
         <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" >
            <a href="escort_perfil/<?php echo e($row->id); ?>"  data-placement="bottom"
               data-toggle="tooltip"
               data-id="<?php echo e($row->id); ?>"  data-show="tip"
               data-original-title="<div class='row'>
               <div class='col-md-12'>
               <div class='form-group'>
               <p class='text-align:left;' style='font-size: 14px;'>
               <i class='fa fa-user'></i> <?php echo e(strtoupper($row->apodo_escort)); ?>

               </p>
               </div>
               </div>
               </div>
               <div class='row'>
               <div class='col-md-12'>
               <div class='form-group'>
               <p class='text-align:left;'  style='font-size: 14px;'>
               <i class='fa fa-phone-square'></i> <?php echo e($row->telefono); ?>

               </p>
               </div>
               </div>
               </div>
               <div class='row'>
               <div class='col-md-12'>
               <div class='form-group'>
               <p class='text-align:left;' style='font-size: 12px;'>
               <i class='fa fa-map-marker'></i> <?php echo e($row->descripcion_comuna); ?>

               </p>
               </div>
               </div>
               </div>
               " data-placement="bottom">
            <img src="<?php echo e(url('uploads/escort_fotos/'.$row->foto_principal)); ?>" class="img-responsive  img-thumbnail"
               style="cursor:pointer" data-placement="bottom">
            </a>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="title-box">
   <div class="col-lg-6 col-md-6 col-sm-6">
      <p class="title">Offering the most unforgettable escorting experiences</p>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3">
      <p class="title1">Praesent vestibulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus. Null dui. Fusce feugiat malesuada odio.</p>
   </div>
   <div class="col-lg-3 col-md-3 col-sm-3">
      <p class="title2"><span>&ldquo;</span>Praesent vestibulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient montes ascetur ridiculus mus.<span>&rdquo;</span></p>
      <a href="#">John Lennon</a>
   </div>
</div>
<div class="iconic-box">
   <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 maxheight wow fadeInUp">
      <figure><img src="img/page1_icon1.png" alt=""></figure>
      <p class="title">travel<br>companion</p>
      <p>Praesent vestibulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient.</p>
      <a href="#" class="btn-default btn1">read more</a>
   </div>
   <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 maxheight wow fadeInUp" data-wow-delay="0.2s">
      <figure><img src="img/page1_icon2.png" alt=""></figure>
      <p class="title">outcall<br>hotel visits</p>
      <p>Praesent vestibulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient.</p>
      <a href="#" class="btn-default btn1">read more</a>
   </div>
   <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 maxheight wow fadeInUp" data-wow-delay="0.4s">
      <figure><img src="img/page1_icon3.png" alt=""></figure>
      <p class="title">home<br>visits</p>
      <p>Praesent vestibulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient.</p>
      <a href="#" class="btn-default btn1">read more</a>
   </div>
   <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 maxheight wow fadeInUp" data-wow-delay="0.6s">
      <figure><img src="img/page1_icon4.png" alt=""></figure>
      <p class="title">party<br>invitation</p>
      <p>Praesent vestibulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient.</p>
      <a href="#" class="btn-default btn1">read more</a>
   </div>
   <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 maxheight wow fadeInUp" data-wow-delay="0.8s">
      <figure><img src="img/page1_icon5.png" alt=""></figure>
      <p class="title">dinner<br>dates</p>
      <p>Praesent vestibulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient.</p>
      <a href="#" class="btn-default btn1">read more</a>
   </div>
   <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 maxheight wow fadeInUp" data-wow-delay="1s">
      <figure><img src="img/page1_icon6.png" alt=""></figure>
      <p class="title">tour<br>guide</p>
      <p>Praesent vestibulum aenean noummy endrerit mauris. Cum sociis natoque penatibus et magnis dis parturient.</p>
      <a href="#" class="btn-default btn1">read more</a>
   </div>
</div>
<?php $__env->stopSection(); ?>
<script src="<?php echo e(url('js/jquery-2.1.4.min.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
<script>
   $(document).ready(function () {
   
      
       $('input[name="checkFilters[]"]').on('change', function (e) {

            e.preventDefault();
            apariencia_select = []; // reset
            filterWrapper = $('#resultadoFilter');
            buttonWrapper = $('#buttonFilter');
            var filter = $(this).attr("data-filter");
            
             
               $('input[name="checkFilters[]"]:checked').each(function() {
                  
                   
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
            $(document).on('click','.btnRemoveCheckbox',function(e){
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
   
               $("body").tooltip({
                  selector:'[data-show=tip]',
                  html: true,
                  animated: 'fade',
               
               });
   
   }); 
</script>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives\resources\views/welcome.blade.php ENDPATH**/ ?>