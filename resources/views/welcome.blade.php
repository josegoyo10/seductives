@extends('layout')
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
@section('content')
<div id="content-block">
   <div class="head-bg">
      <!--div class="head-bg-img"></div!-->
      <!--div class="head-bg-content">
         <div id="myCarousel" class="carousel slide" data-ride="carousel" 
         style="width: 650px; margin-left:240px; padding-top:50px;">
         
         <ol class="carousel-indicators">
         <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
         <li data-target="#myCarousel" data-slide-to="1"></li>
         <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
         
         <div class="carousel-inner">
         <div class="item active">
            <img src="img/la.jpg" alt="Los Angeles">
         </div>
         <div class="item">
            <img src="img/chicago.jpg" alt="Chicago">
         </div>
         <div class="item">
            <img src="img/ny.jpg" alt="New York">
         </div>
         </div>
         
         <a class="left carousel-control" href="#myCarousel" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         <span class="sr-only">Anterior</span>
         </a>
         <a class="right carousel-control" href="#myCarousel" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         <span class="sr-only">Siguiente</span>
         </a>
         </div!-->
   </div>
</div>
<!--div class="container-fluid cd-main-content custom-container">
   <div class="row">
      <div class="col-md-2 left-feild">
         <form action="./" class="input-search">
            <input type="text" required="" placeholder="Enter keyword">
            <i class="fa fa-search"></i>
            <input type="submit" value="">
         </form>
      </div>
      <div class="col-md-10 ">
         <div class="for-be-dropdowns">
            <div class="be-drop-down">
               <i class="icon-projects"></i>
               <span class="be-dropdown-content"> Projects	</span>
               <ul class="drop-down-list">
                  <li class="filter" data-filter=".category-1"><a data-type="category-1">Projects</a></li>
                  <li class="filter" data-filter=".category-2"><a data-type="category-2">Work in Progress</a></li>
                  <li class="filter" data-filter=".category-3"><a data-type="category-3">People</a></li>
               </ul>
            </div>
            <div class="be-drop-down">
               <i class="icon-creative"></i>
               <span class="be-dropdown-content">All Creative Filds
               </span>
               <ul class="drop-down-list">
                  <li class="filter" data-filter=".category-4"><a>Item - 1</a></li>
                  <li class="filter" data-filter=".category-5"><a>Item - 2</a></li>
                  <li class="filter" data-filter=".category-1"><a>Item - 3</a></li>
               </ul>
            </div>
            <div class="be-drop-down">
               <i class="icon-features"></i>
               <span class="be-dropdown-content">Features
               </span>
               <ul class="drop-down-list">
                  <li class="filter" data-filter=".category-2"><a>Featured</a></li>
                  <li class="filter" data-filter=".category-3"><a>Most Appreciated</a></li>
                  <li class="filter" data-filter=".category-4"><a>Most Viewed</a></li>
                  <li class="filter" data-filter=".category-5"><a>Most Discussed</a></li>
                  <li class="filter" data-filter=".category-1"><a>Most Recent</a></li>
               </ul>
            </div>
            <div class="be-drop-down">
               <i class="icon-worldwide"></i>
               <span class="be-dropdown-content">Worldwide
               </span>
               <ul class="drop-down-list">
                  <li class="filter" data-filter=".category-2"><a>WorldWide</a></li>
                  <li class="filter" data-filter=".category-3"><a>United States</a></li>
                  <li class="filter" data-filter=".category-4"><a>Germany</a></li>
                  <li class="filter" data-filter=".category-5"><a>United Kingdom</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div!-->
</div>
<div class="container-fluid custom-container">
   <div class="row">
      @include('sidebar')
      <div class="col-md-10">
         <div id="container-mix"  class="row _post-container_">
            @foreach($data as $row) 
            <div class="category-1 mix custom-column-5">
               <div class="be-post">
                  <a href="escort_perfil/{{ $row->id }}" class="be-img-block red-tooltip" id="modalEscort" data-show="tip" 
                     style="cursor:pointer"
                     data-id="{{ $row->id }}" 
                     data-original-title="<div class='row'>
                     <div class='col-md-12'>
                     <div class='form-group'>
                        <p class='text-align:left;' style='font-size: 12px;'>
                           <i class='fa fa-user'></i> {{ $row->nombres}}
                        </p>
                     </div>
                     </div>
                     </div>
                     <div class='row'>
                     <div class='col-md-12'>
                         <div class='form-group'>
                           <p class='text-align:left;'  style='font-size: 12px;'>
                              <i class='fa fa-phone-square'></i> {{ $row->telefono}}
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
                     <!--{{ url($row->foto_principal) }}!-->
                     <img src= "#" 
                        alt="omg"  class="be-img-block">
                     <span title="The tooltip" data-toggle="tooltip" data-placement="top" ></span>
                  </a>
                  </span>
                     <a href="page1.html" class="be-post-title" style="font-size:10px;">{{ $row->nombres }}</a>
                  <span>
                  <a href="blog-detail-2.html" class="be-post-tag"></a>, 
                  <!-- <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                  <a href="blog-detail-2.html" class="be-post-tag">Web Design</a> -->
                  </span>
                  <!-- Generated markup by the plugin -->
                  <!--div class="author-post">
                     // <img src="img/a1.png" alt="" class="ava-author">
                     
                     // <span>by <a href="page1.html">Hoang Nguyen</a></span>
                     // </div!-->
                  <!--div class="info-block" style="width:10px;">
                     <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                     <span><i class="fa fa-eye"></i> 789</span>
                     <span><i class="fa fa-comment-o"></i> 20</span>
                     </div!-->
               </div>
            </div>
            @endforeach
         </div>
      </div>
   </div>
</div>
@stop
<script src='{{ url("js/jquery-2.1.4.min.js") }}'></script>
<script src='{{ url("js/bootstrap.min.js") }}'></script>
<!-- Modal para mostrar las fotos relacionadas a las escorts -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"><span id="nombre_escort" class="texto_escort"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-sm-5">
                  <div class="box box-primary">
                     <div class="box-body">
                        <div class="form-group ">
                           <label>Edad:</label>
                           <span id="edad_escort"><em></em></span>
                        </div>
                     </div>
                     <div class="box-body">
                        <div class="form-group ">
                           <label>Altura:</label>
                           <span id="altura_escort"><em></em></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-7">
                  <div class="box box-primary">
                     <div class="box-body">
                        <div class="form-group">
                           <img src= "" alt="omg" id="image_escort" style="width:300px;">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
         </div>
         <!--fin modal !-->
      </div>
   </div>
</div>
<!---------------------------------------------------------------------!-->
<script>
   $(document).ready(function(){
   
       $("body").tooltip({
          selector:'[data-show=tip]',
          animated: 'fade',
          html: true
          
          
        });
   
         // //Modal para mostrar info de la escort.
         // $(".red-tooltip").click(function(){
         //    var id_escort = $(this).attr("data-id"); 
         //     $('#nombre_escort').html('');
         //     $('#edad_escort').html('');
         //     $('#altura_escort').html('');
         //     $('#image_escort').attr('src', '');
         //   // alert('mostrar:'+ id_escort);
         //           $.ajax({
         //                url:'/getEscortInfo',
         //                type:'GET',
         //                data: {
         //                   id: id_escort
         //                },
         //                dataType: 'JSON',
         //                success:function(data) {
         //                   //var datos =  JSON.parse(data);
         //                 //  console.log(data[0].nombres);
         //                 $('#nombre_escort').html(data.respuesta[0].nombres);
         //                 $('#edad_escort').html(data.respuesta[0].edad); 
         //                 $('#altura_escort').html(data.respuesta[0].altura); 
         //                 $("#image_escort").attr("src", " " + data.respuesta[0].foto_principal);
   
         //              },
                    
         //          });
         //       });
   
   
   }); 
</script>