@extends('layout')
@section('css')
<link rel="stylesheet" href='{{ url("css/estilos.css") }}'>
@endsection
@section('content')
<div class="global indent">
   <!--content-->
   <div class="container">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     
      <h2 data-toggle="collapse" data-target="#demo" style="cursor:pointer;">Filtra tus Escorts a un Click</h2>
      <div id="demo" class="collapse" style="color:#ffff;">
        <input type="text" id="search-results" value="" />
        <br><br>
     
         @csrf
         <div class="row">
            <div class="col-sm-2">
               
               <div class="row">
                  <div class="col-lg-12">
                     <div class="button-group">
                    
                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" value="Apariencia Fisicas">Apariencias Fisicas</button>
                        <ul class="dropdown-menu">
                           <li><a href="#" class="small" data-value="Delgada" tabIndex="-1">
                             <input type="checkbox" name="apariencia[]" value="Delgada" />&nbsp;Delgada</a>
                           </li>
                           <li><a href="#" class="small" data-value="Normal" tabIndex="-1"><input type="checkbox"  name="apariencia[]" value="Normal"/>&nbsp;Normal</a></li>
                           <li><a href="#" class="small" data-value="Culona" tabIndex="-1"><input type="checkbox"  name="apariencia[]" value="Culona"/>&nbsp;Culona</a></li>
                           <li><a href="#" class="small" data-value="Tetona" tabIndex="-1"><input type="checkbox"  name="apariencia[]" value="Tetona"/>&nbsp;Tetona</a></li>
                           <li><a href="#" class="small" data-value="Rellena" tabIndex="-1"><input type="checkbox" name="apariencia[]" value="Rellena"/>&nbsp;Rellena</a></li>
                          
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
                          @foreach($tipo_servicios as $tipo)
                           <li><a href="#" class="small" data-value="{!! $tipo->nombre_servicio !!}" tabIndex="-1">
                                  <input type="checkbox"/>&nbsp;{!! $tipo->nombre_servicio !!}
                              </a>
                           </li>
                          @endforeach
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
                           <li><a href="#" class="small" data-value="Blanca" tabIndex="-1"><input type="checkbox"/>&nbsp;Blanca</a></li>
                           <li><a href="#" class="small" data-value="Morena" tabIndex="-1"><input type="checkbox"/>&nbsp;Morena</a></li>
                           <li><a href="#" class="small" data-value="Rubia" tabIndex="-1"><input type="checkbox"/>&nbsp;Rubia</a></li>
                           <li><a href="#" class="small" data-value="Negra" tabIndex="-1"><input type="checkbox"/>&nbsp;Negra</a></li>
                           <li><a href="#" class="small" data-value="Trigueña" tabIndex="-1"><input type="checkbox"/>&nbsp;Trigueña</a></li>
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
                           <li><a href="#" class="small" data-value="Negro" tabIndex="-1"><input type="checkbox"/>&nbsp;Negro</a></li>
                           <li><a href="#" class="small" data-value="Peliroja" tabIndex="-1"><input type="checkbox"/>&nbsp;Peliroja</a></li>
                           <li><a href="#" class="small" data-value="Rubio" tabIndex="-1"><input type="checkbox"/>&nbsp;Rubio</a></li>
                           <li><a href="#" class="small" data-value="Castaño" tabIndex="-1"><input type="checkbox"/>&nbsp;Castaño</a></li>
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
                           <li><a href="#" class="small" data-value="Menos de 1.60" tabIndex="-1"><input type="checkbox"/>&nbsp;Menos de 1.60 mts</a></li>
                           <li><a href="#" class="small" data-value="1.60 a 1.65" tabIndex="-1"><input type="checkbox"/>&nbsp;1.60 a 1.65 mts</a></li>
                           <li><a href="#" class="small" data-value="1.70 a 1.75" tabIndex="-1"><input type="checkbox"/>&nbsp;1.70 a 1.75 mts</a></li>
                           <li><a href="#" class="small" data-value="Más de 1.75" tabIndex="-1"><input type="checkbox"/>&nbsp;Más de 1.75 mts</a></li>
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
                           <li><a href="#" class="small" data-value="18 a 21" tabIndex="-1"><input type="checkbox"/>&nbsp;18 a 21 </a></li>
                           <li><a href="#" class="small" data-value="21 a 25" tabIndex="-1"><input type="checkbox"/>&nbsp;21 a 25 </a></li>
                           <li><a href="#" class="small" data-value="25 a 30" tabIndex="-1"><input type="checkbox"/>&nbsp;25 a 30 </a></li>
                           <li><a href="#" class="small" data-value="Mayor de 30" tabIndex="-1"><input type="checkbox"/>&nbsp;Mayor de 30</a></li>
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
                           <li><a href="#" class="small" data-value="$20.000 a $40.000" tabIndex="-1"><input type="checkbox"/>&nbsp; $20.000 a $40.000 </a></li>
                           <li><a href="#" class="small" data-value="$45.000 a $60.000" tabIndex="-1"><input type="checkbox"/>&nbsp; $45.000 a $60.000 </a></li>
                           <li><a href="#" class="small" data-value="$60.000 a $80.000" tabIndex="-1"><input type="checkbox"/>&nbsp;$60.000 a $80.000 </a></li>
                           <li><a href="#" class="small" data-value="Mayor de $80.000" tabIndex="-1"><input type="checkbox"/>&nbsp;Mayor de  $80.000</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
      <hr>
      <div class="row imagetiles" id="resultadoFilter">
     
      </div>
      <div class="row imagetiles" id="divEscorts">
         @foreach($data as $row)
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" >
            <a href="escort_perfil/{{ $row->id }}"  data-placement="bottom"
               data-toggle="tooltip"
               data-id="{{ $row->id }}"  data-show="tip"
               data-original-title="<div class='row'>
               <div class='col-md-12'>
               <div class='form-group'>
               <p class='text-align:left;' style='font-size: 14px;'>
               <i class='fa fa-user'></i> {{ strtoupper($row->apodo_escort)}}
               </p>
               </div>
               </div>
               </div>
               <div class='row'>
               <div class='col-md-12'>
               <div class='form-group'>
               <p class='text-align:left;'  style='font-size: 14px;'>
               <i class='fa fa-phone-square'></i> {{ $row->telefono}}
               </p>
               </div>
               </div>
               </div>
               <div class='row'>
               <div class='col-md-12'>
               <div class='form-group'>
               <p class='text-align:left;' style='font-size: 12px;'>
               <i class='fa fa-map-marker'></i> {{ $row->descripcion_comuna}}
               </p>
               </div>
               </div>
               </div>
               " data-placement="bottom">
            <img src="{{ url('uploads/escort_fotos/'.$row->foto_principal) }}" class="img-responsive"
               style="cursor:pointer" data-placement="bottom">
            </a>
         </div>
         @endforeach
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
@endsection
<script src="{{url('js/jquery-2.1.4.min.js') }}"></script>
@stack('scripts')
<script>
   $(document).ready(function () {
   
      
      $('input[name="apariencia[]"]').on('change', function (e) {

            e.preventDefault();
            apariencia_select = []; // reset
            filterWrapper = $('#resultadoFilter');
            var y = 0;

            $('input[name="apariencia[]"]:checked').each(function()
            {
               apariencia_select.push($(this).val());
               $('#search-results').val(apariencia_select);
               
            });

            $.ajax({
                

               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
			          data:  {
			            "opciones" : apariencia_select,
                     "filtro:": 'apariencia'
			          }, 
			           url:   '/filter_SelectMenu',
			           type:  'POST',
                    dataType: "json",
			           success:  function (data) {
			            alert("GEO2xxx");
                     $('#divEscorts').empty();
                   //  $('.imagetiles').remove();
                    // $('#divEscorts').hide();
                      $('#images_escorts').empty();
                      $('#resultadoFilter').empty();
                   
                     console.log(data);
                     console.log(data.resultados[0].foto_principal);
                     filterWrapper.html();


                     // for (index = 0 ; index < data.resultados.length / 4 ; index++) {
                     //       var row = document.createElement('div');
                     //       row.className="row";
                     //       for (j = index * 4 ; j < (index * 4) + 4 ; j++) {
                     //          var col = document.createElement('div');
                     //          $(col).addClass("col-md-4");
                     //          $(col).html('<img src=uploads/escort_fotos/' + data.resultados[0].foto_principal + '>');
                     //          $(row).append(col);
                     //       }
                     //       filterWrapper.append(row);
                     //    }




                   //  $.each(data.resultados, function(i, resultado){
                        //do something
                       //alert(resultado.apodo_escort);
                       alert(data.resultados[0].apodo_escort)
                      
                        
                         for (var i = 0, j = data.resultados.length; i < j; i++){

                            

                           if(i==0 || i%4 == 0)
                           {
                              var appendEl = $("<div class='row'></div>").appendTo(filterWrapper);
                           }
                              $("</div><div class='col-md-3 col-sm-3 col-xs-3'><img src=uploads/escort_fotos/"+ data.resultados[i].foto_principal + " data-id="+i+" class='img-responsive img-thumbnail'></div>").appendTo(appendEl);
                           }
                                                

                        //    if(i>=0 || i%4 == 0)
                        //   {
                        //       var appendEl = $("<div class='row'></div>").appendTo(filterWrapper);
                        //    }
                        //       $("</div><div class='col-md-3 col-sm-3 col-xs-3'>"+
                        //        "<a href=escort_perfil/"+resultado.id+ "' data-placement='bottom'  data-toggle='tooltip' data-id="+ resultado.id +" data-show='tip' " +
                        //          ">"+
                        //          "<img  class=img-responsive  data-placement='bottom' src=uploads/escort_fotos/"+ resultado.foto_principal +" style='cursor:pointer' class='img-responsive'>"+
                                 
                        //           "</a></div>").appendTo(appendEl)
                                                                
                           
                          


                     //          // filterWrapper.append(
                     //          //     '<div class="row">'+
                     //          //      '<div class="col-sm-4" >' +
                     //          //        '<a href=escort_perfil/'+resultado.id+' data-placement="bottom"  data-toggle="tooltip" data-id='+ resultado.id +' data-show="tip" '+ 
                                         
                     //          //              '>' +
                     //          //              '<img  class=img-responsive  data-placement="bottom" src=uploads/escort_fotos/'+ resultado.foto_principal +' style="cursor:pointer" class="img-responsive">' + 
                     //          //          '</a>' +
                     //          //       '</div>'+
                     //          //    '</div>');
                      
                     //    // filterWrapper.append(
                     //    //           '<div id="images_escorts"><div class="row imagetiles">'+
                     //    //            '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" >' +
                     //    //              '<a href=escort_perfil/'+resultado.id+' data-placement="bottom"  data-toggle="tooltip" data-id='+ resultado.id +' data-show="tip" '+ 
                                         
                     //    //                    '>' +
                     //    //                    '<img  class=img-responsive  data-placement="bottom" src=uploads/escort_fotos/'+ resultado.foto_principal +' style="cursor:pointer" class="img-responsive">' + 
                     //    //                '</a>' +
                     //    //             '</div>'+
                     //    //          '</div></div>');
                     //    console.log(data);
                   //}); 
  

            
                   

          

			             console.log(data);
			          }
			 });

      //var options = [];
   
          //$( '.dropdown-menu a' ).on( 'click', function( event ) {
   
            // var $target = $( event.currentTarget ),
            //    val = $target.attr( 'data-value' ),
            //    $inp = $target.find( 'input' ),
            //    idx;
   
            // if ( ( idx = options.indexOf( val ) ) > -1 ) {
            //    options.splice( idx, 1 );
            //    setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
            // } else {
            //    options.push( val );
            //    setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
            // }
   
            // $( event.target ).blur();
               
         //    $.ajax({

         //       headers: {
         //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         //         },
			//           data:  {
			//             "opciones" : options
			//           }, 
			//            url:   '/filter_SelectMenu',
			//            type:  'POST',
			//           success:  function (data) {
			//             alert("GEO2xxx");
			//             //$('#resultado').html(data);
			//             //location.reload();
			//                console.log(data);
			//           }
			//   });
            
            
            
          // console.log( options );
            
         });
   
   
   
   
         
      $('.select2').select2();
   
    $("body").tooltip({
       selector:'[data-show=tip]',
       html: true,
       animated: 'fade',
   
    });
   
   }); 
</script>