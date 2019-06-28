@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{url('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url('css/icon.css') }}">
<link rel="stylesheet" href='{{url("css/loader.css") }}'>
<link rel="stylesheet" href='{{url("css/idangerous.swiper.css") }}'>
<link rel="stylesheet" href='{{url("css/jquery-ui.css") }}'>
<link rel="stylesheet" href='{{url("css/stylesheet.css")}}'>
<link rel="stylesheet" href='{{url("css/magnific.css")}}'>
<!-- DataTables -->
<link rel="stylesheet" href='{{url("adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}'>
@endsection
@section('content')
<!-- MAIN CONTENT -->
<div id="content-block">
   <div class="container custom-container be-detail-container">
      <a href="{{ URL::previous() }}" class="btn color-1" style="">Regresar</a>
      <div class="row">
         <div class="col-md-9 col-md-push-3" style="border: 1px solid #d8d6d6;border-radius: 10px 30px;">
            <div class="be-large-post">
               <div class="info-block">
                  <div class="be-large-post-align">
                     <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                     <span><i class="fa fa-eye"></i> 753</span>
                     <span><i class="fa fa-comment-o"></i> 50</span>
                  </div>
               </div>
               <div class="blog-content popup-gallery be-large-post-align">
                  <h5 class="be-post-title to">
                     {{ $query->edad }} años, <i class='fa fa-whatsapp'></i> {{ $query->telefono }}
                  </h5>
                  <span class="be-text-tags">
                  <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>, 
                  <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                  <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>
                  </span>
                  <div class="clear"></div>
                  <div class="post-text">
                     <p>Fusce dolor libero, efficitur et lobortis at, faucibus nec nunc. Proin fermentum turpis eget nisi facilisis lobortis. Praesent malesuada facilisis maximus. Donec sed lobortis tortor. Ut nec lacinia sapien, sit amet dapibus magna. Vestibulum nunc ex, tempus et volutpat nec, convallis ut massa. Sed ultricies luctus ipsum in placerat.
                     <p>Mauris ultrices pharetra lectus sit amet commodo. Fusce ac sagittis magna. Nulla sed ligula sed dui tristique convallis non sit amet dui. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                     <div class="image-block">
                        <a class="popup-a" href="img/l1.jpg">
                        <img src="{{ url('img/l1.jpg') }}" alt="">
                        </a>
                        <div class="image-text">Ut pulvinar tellus sed elit luctus aliquet. Suspendisse hendrerit sapien a aliquet porttitor. In hendrerit consequat neque eget egestas. In a consectetur felis. In euismod lectus eros, quis sollicitudin diam tincidunt sed. Duis rhoncus nunc in lobortis lacinia.</div>
                     </div>
                     <a class="popup-a" href="img/l2.jpg">
                     <img src="{{ url('img/l2.jpg') }}" alt="">
                     </a>						
                     <p>Mauris sodales tellus vel felis dapibus, sit amet porta nibh egestas. Sed dignissim tellus quis sapien sagittis cursus. Cras porttitor auctor sapien, eu tempus nunc placerat nec. Donec metus tortor, dignissim at vehicula ac, lacinia vel massa. Quisque mollis dui lacus, et fermentum erat euismod in. Integer sit amet augue ligula.</p>
                     <div class="image-block">
                        <a class="popup-a" href="img/l3.jpg">
                        <img src="{{ url('img/l3.jpg') }}"		 alt="">
                        </a>
                        <div class="image-text">Integer blandit velit nec purus convallis ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In blandit porttitor urna, eu ultrices enim volutpat ut.</div>
                     </div>
                  </div>
               </div>
               <div class="be-large-post-align">
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="be-post">
                     <a href="blog-detail-2.html" class="be-img-block">
                     <img src ="{{ url('img/p3.jpg') }}" alt="omg">
                     </a> 
                     <a href="blog-detail-2.html" class="be-post-title">Colors of Ramadan</a>
                     <span>
                     <a href="blog-detail-2.html" class="be-post-tag">Interaction Design</a>, 
                     <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                     <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>
                     </span>
                     <div class="author-post">
                        <img src="{{ url('img/a5.png')}}" alt="" class="ava-author">
                        <span>by <a href="blog-detail-2.html">Hoang Nguyen</a></span>
                     </div>
                     <div class="info-block">
                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                        <span><i class="fa fa-eye"></i> 789</span>
                        <span><i class="fa fa-comment-o"></i> 20</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="be-post">
                     <a href="blog-detail-2.html" class="be-img-block">
                     <img src="{{ url('img/p4.jpg') }}" alt="omg">
                     </a> 
                     <a href="blog-detail-2.html" class="be-post-title">Leaving Home - L'Officiel Ukraine</a>
                     <span>
                     <a href="blog-detail-2.html" class="be-post-tag">Interaction Design</a>, 
                     <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                     <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>
                     </span>
                     <div class="author-post">
                        <img src="{{ url('img/a5.png') }}" alt="" class="ava-author">
                        <span>by <a href="blog-detail-2.html">Hoang Nguyen</a></span>
                     </div>
                     <div class="info-block">
                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                        <span><i class="fa fa-eye"></i> 789</span>
                        <span><i class="fa fa-comment-o"></i> 20</span>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="be-post">
                     <a href="blog-detail-2.html" class="be-img-block">
                     <img src="{{ url('img/p5.jpg') }}" alt="omg">
                     </a> 
                     <a href="blog-detail-2.html" class="be-post-title">Drive Your World</a>
                     <span>
                     <a href="blog-detail-2.html" class="be-post-tag">Interaction Design</a>, 
                     <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                     <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>
                     </span>
                     <div class="author-post"> 
                        <img src="{{url('img/a9.png')}}" alt="" class="ava-author">
                        <span>by <a href="blog-detail-2.html">Hoang Nguyen</a></span>
                     </div>
                     <div class="info-block">
                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                        <span><i class="fa fa-eye"></i> 789</span>
                        <span><i class="fa fa-comment-o"></i> 20</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="be-comment-block">
               <h1 class="comments-title">Comentarios ({!! $count !!})</h1>
               
			   
			   @include('admin.escort_register.commentsDisplay', ['comments' => $usuario->comments, 'escort_id' => $query->id])
                
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


            </div>
         </div>
         <div class="col-md-3 col-md-pull-9 left-feild">
            <div class="be-user-block">
               <div class="be-user-detail">
                  <a class="be-ava-user" href="blog-detail-2.html">
                  <img src="{{ $query->foto_principal}}" alt=""> 
                  </a>  
                  <p class="be-use-name">{{ $query->nombres }}</p>
                  <span class="be-user-info">
                  {{ $query->descripcion_comuna }},{{ $query->descripcion_region }}
                  </span>
               </div>
               <!-- <div class="be-user-activity-block">
                  <div class="row">
                     <div class="col-lg-6">
                        <a href="blog-detail-2.html" class="be-user-activity-button be-follow-type">
                        <i class="fa fa-plus"></i>FOLLOW</a>
                     </div>
                     <div class="col-lg-6">
                        <a href="blog-detail-2.html" 
                           class="col-lg-6 be-user-activity-button send-btn be-message-type">
                        <i class="fa fa-envelope-o"></i>MESSAGE</a>
                     </div>
                  </div>
               </div> -->
               <h5 class="be-title">
                  Sobre Mi
               </h5>
               <p class="be-text-userblock">
                  {{ $query->descripcion_servicio }}
               </p>
            </div>
            <a href="blog-detail-2.html" class="be-button-vidget like-btn blue-style"><i class="fa fa-thumbs-o-up"></i>LIKE PROJECT</a>
            <a href="blog-detail-2.html" class="be-button-vidget add-btn grey-style"><i class="fa fa-file-o"></i>ADD TO COLLECTION</a>
            <h3 class="letf-menu-article text-center">Recent Works</h3>
            <div  class="swiper-container" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <div class="be-post">
                        <a href="blog-detail-2.html" class="be-img-block">
                        <img src="{{ url('img/p9.jpg') }}" height="202" width="269" alt="omg">
                        </a> 
                        <a href="blog-detail-2.html" class="be-post-title">NAHA Finalist Hairstylist of the Year Allen Ruiz</a>
                        <span>
                        <a href="blog-detail-2.html" class="be-post-tag">Art direction</a>, 
                        <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>,  
                        <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>
                        </span>
                        <div class="author-post">
                           <img src="{{ url('img/ava.png') }}" alt="" class="ava-author">
                           <span>by <a href="blog-detail-2.html">Daniel Ng</a></span>
                        </div>
                        <div class="info-block">
                           <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                           <span><i class="fa fa-eye"></i> 753</span>
                           <span><i class="fa fa-comment-o"></i> 50</span>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="be-post">
                        <a href="blog-detail-2.html" class="be-img-block">
                        <img src ="{{ url('img/p9.jpg') }}" height="202" width="269" alt="omg">
                        </a>
                        <a href="blog-detail-2.html" class="be-post-title">NAHA Finalist Hairstylist of the Year Allen Ruiz</a>
                        <span>
                        <a href="blog-detail-2.html" class="be-post-tag">Art direction</a>, 
                        <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>,  
                        <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>
                        </span>
                        <div class="author-post">
                           <img src="{{ url('img/ava.png') }}" alt="" class="ava-author">
                           <span>by <a href="blog-detail-2.html">Daniel Ng</a></span>
                        </div>
                        <div class="info-block">
                           <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                           <span><i class="fa fa-eye"></i> 753</span>
                           <span><i class="fa fa-comment-o"></i> 50</span>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="be-post">
                        <a href="blog-detail-2.html" class="be-img-block">
                        <img src="{{ url('img/p9.jpg') }}" height="202" width="269" alt="omg">
                        </a> 
                        <a href="blog-detail-2.html" class="be-post-title">NAHA Finalist Hairstylist of the Year Allen Ruiz</a>
                        <span>
                        <a href="blog-detail-2.html" class="be-post-tag">Art direction</a>, 
                        <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>,  
                        <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>
                        </span>
                        <div class="author-post">
                           <img src="{{ url('img/ava.png') }}" alt="" class="ava-author">
                           <span>by <a href="blog-detail-2.html">Daniel Ng</a></span>
                        </div>
                        <div class="info-block">
                           <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                           <span><i class="fa fa-eye"></i> 753</span>
                           <span><i class="fa fa-comment-o"></i> 50</span>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="be-post">
                        <a href="blog-detail-2.html" class="be-img-block">
                        <img src="{{ url('img/p9.jpg') }}" height="202" width="269" alt="omg">
                        </a> 
                        <a href="blog-detail-2.html" class="be-post-title">NAHA Finalist Hairstylist of the Year Allen Ruiz</a>
                        <span>
                        <a href="blog-detail-2.html" class="be-post-tag">Art direction</a>, 
                        <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>,  
                        <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>
                        </span>
                        <div class="author-post">
                           <img src="{{ url('img/ava.png') }}" alt="" class="ava-author">
                           <span>by <a href="blog-detail-2.html">Daniel Ng</a></span>
                        </div>
                        <div class="info-block">
                           <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                           <span><i class="fa fa-eye"></i> 753</span>
                           <span><i class="fa fa-comment-o"></i> 50</span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="pagination">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
<!-- SCRIPTS	 -->
@section('scripts')
<script src='{{ url("js/jquery-2.1.4.min.js") }}'></script> 
<script src='{{ url("js/bootstrap.min.js") }}'></script>
<script src='{{ url("js/idangerous.swiper.min.js") }}'></script>
<script src='{{ url("js/isotope.pkgd.min.js") }}'></script>
<script src='{{ url("js/jquery.viewportchecker.min.js") }}'></script>
<script src='{{ url("js/magnific.js") }}'></script>
<script src='{{ url("js/global.js") }}'></script>
<!-- DataTables -->
<script src='{{ url("adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js") }}'></script>
<script src ='{{ url("adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}'></script>
@endsection('scripts')