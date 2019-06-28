@extends('layout')
<link rel="stylesheet" href='{{ url("adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}'>
<link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css'>

@section('content')
<div id="content-block">
   <div class="container custom-container be-detail-container">
      <div class="row">
         <div class="col-md-9 col-md-push-3">
            <div class="be-large-post">
                  <div class="info-block">
                     <div class="be-large-post-align">
                        <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                        <span><i class="fa fa-eye"></i> 753</span>
                        <span><i class="fa fa-comment-o"></i> 50</span>
                     </div>
                  </div>
           

               <div class="blog-content popup-gallery be-large-post-align">
                  <h3 class="be-post-title to">{{ $data->edad }} años,
                      {{ $data->telefono }} <i class="fa fa-whatsapp" style="color:green;"></i>
                  </h3>
                  <span class="be-text-tags">
                  <!-- <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>, 
                  <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                  <a href="blog-detail-2.html" class="be-post-tag">Web Design</a> -->
                  </span>
                   <div class="clear"></div>
                     <div class="post-text">
                     <div class="be-large-post-slider type-wide">
									<div class="swiper-container thumbnails-preview" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
						                <div class="swiper-wrapper">
					                    	<div class="swiper-slide active" data-val="0">
					                    		 <img class="img-responsive img-full" src="{{ $data->foto_principal }}" alt="" style="width:100%">
					                    		
					                    	</div>
					                    	<div class="swiper-slide" data-val="1">
					                    		 <img class="img-responsive img-full" src="{{ $data->foto_secundaria_1 }}" alt="">
					                    		 <div class="slider-text">Ut pulvinar tellus sed elit luctus aliquet. Suspendisse hendrerit sapien a aliquet porttitor. In hendrerit consequat neque eget egestas. In a consectetur felis. In euismod lectus eros, quis sollicitudi.</div>			                    		 
					                    	</div>
					                    	<div class="swiper-slide" data-val="2">
					                    		 <img class="img-responsive img-full" src="{{ $data->foto_secundaria_2 }}"alt="">
					                    		
					                    	</div>
					                   
					                    </div>
						                <div class="pagination hidden"></div>
						                <div class="swiper-arrow-left type-2"></div>
						                <div class="swiper-arrow-right type-2"></div>
						            </div>
								</div>
                
                    </div>
               </div>
            </div>
            <!-- <div class="row">
               <div class="col-md-4">
                  <div class="be-post">
                     <a href="blog-detail-2.html" class="be-img-block">
                     <img src='{{ url("img/p3.jpg") }}' alt="omg">
                     </a>
                     <a href="blog-detail-2.html" class="be-post-title">Colors of Ramadan</a>
                     <span>
                     <a href="blog-detail-2.html" class="be-post-tag">Interaction Design</a>, 
                     <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                     <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>
                     </span>
                     <div class="author-post">
                        <img src='{{ url("img/a5.png") }}' alt="" class="ava-author">
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
                     <img src='{{ url("img/p4.jpg") }}' alt="omg">
                     </a>
                     <a href="blog-detail-2.html" class="be-post-title">Leaving Home - L'Officiel Ukraine</a>
                     <span>
                     <a href="blog-detail-2.html" class="be-post-tag">Interaction Design</a>, 
                     <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                     <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>
                     </span>
                     <div class="author-post">
                        <img src='{{ url("img/a5.png") }}' alt="" class="ava-author">
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
                     <img src='{{ url("img/p5.jpg") }}' alt="omg">
                     </a>
                     <a href="blog-detail-2.html" class="be-post-title">Drive Your World</a>
                     <span>
                     <a href="blog-detail-2.html" class="be-post-tag">Interaction Design</a>, 
                     <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                     <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>
                     </span>
                     <div class="author-post">
                        <img src='{{ url("img/a9.png") }}' alt="" class="ava-author">
                        <span>by <a href="blog-detail-2.html">Hoang Nguyen</a></span>
                     </div>
                     <div class="info-block">
                        <span><i class="fa fa-thumbs-o-up"></i> 360</span>
                        <span><i class="fa fa-eye"></i> 789</span>
                        <span><i class="fa fa-comment-o"></i> 20</span>
                     </div>
                  </div>
               </div>
            </div> -->
            <div class="be-comment-block">
               <h1 class="comments-title">Comentarios (3)</h1>
               <p class="about-comment-block" style="color:#222835;">
                  Debes estar logueado <a href="blog-detail-2.html" class="be-signup-link">Accesar</a>
                 para unirte a la conversación
               </p>
               <div class="be-comment">
                  <div class="be-img-comment">	
                     <a href="blog-detail-2.html">
                     <img src='{{ url("img/c1.png") }}' alt="" class="be-ava-comment">
                     </a>
                  </div>
                  <div class="be-comment-content">
                     <span class="be-comment-name">
                     <a href="blog-detail-2.html">Ravi Sah</a>
                     </span>
                     <span class="be-comment-time">
                     <i class="fa fa-clock-o"></i>
                     May 27, 2015 at 3:14am
                     </span>
                     <p class="be-comment-text">
                        Pellentesque gravida tristique ultrices. 
                        Sed blandit varius mauris, vel volutpat urna hendrerit id. 
                        Curabitur rutrum dolor gravida turpis tristique efficitur.
                     </p>
                  </div>
               </div>
               <div class="be-comment">
                  <div class="be-img-comment">	
                     <a href="blog-detail-2.html">
                     <img src='{{ url("img/c2.png") }}' alt="" class="be-ava-comment">
                     </a>
                  </div>
                  <div class="be-comment-content">
                     <span class="be-comment-name">
                     <a href="blog-detail-2.html">Phoenix, the Creative Studio</a>
                     </span>
                     <span class="be-comment-time">
                     <i class="fa fa-clock-o"></i>
                     May 27, 2015 at 3:14am
                     </span>
                     <p class="be-comment-text">
                        Nunc ornare sed dolor sed mattis. In scelerisque dui a arcu mattis, at maximus eros commodo. Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant. Proin ut ornare lectus, vel eleifend est. Fusce hendrerit dui in turpis tristique blandit.
                     </p>
                  </div>
               </div>
               <div class="be-comment">
                  <div class="be-img-comment">	
                     <a href="blog-detail-2.html">
                     <img src='{{ url("img/c3.png") }}' alt="" class="be-ava-comment">
                     </a>
                  </div>
                  <div class="be-comment-content">
                     <span class="be-comment-name">
                     <a href="blog-detail-2.html">Dorian Camp</a>
                     </span>
                     <span class="be-comment-time">
                     <i class="fa fa-clock-o"></i>
                     May 27, 2015 at 3:14am
                     </span>
                     <p class="be-comment-text">
                        Cras magna nunc, cursus lobortis luctus at, sollicitudin vel neque. Duis eleifend lorem non ant
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-md-pull-9 left-feild">
            <div class="be-user-block">
               <div class="be-user-detail">
                  <a class="be-ava-user"  style="border-radius: 50%;" href="blog-detail-2.html">
                  <img src='{{ $data->foto_secundaria_1 }}' alt=""> 
                  </a>
                  <p class="be-use-name">{{ $data->nombres }}</p>
                  <span class="be-user-info">
                  {{ $data->descripcion_region }}, {{ $data->descripcion_comuna  }} 
                  </span>
               </div>
               <div class="be-user-activity-block">
                  <div class="row">
                     <div class="col-lg-6">
                        <a href="blog-detail-2.html" class="be-user-activity-button be-follow-type"><i class="fa fa-plus"></i>SIGUEME</a>
                     </div>
                     <div class="col-lg-6">
                        <a href="blog-detail-2.html" class="col-lg-6 be-user-activity-button send-btn be-message-type"><i class="fa fa-envelope-o"></i>MENSAJE</a>
                     </div>
                  </div>
               </div>
               <h5 class="be-title">
                  SOBRE MI
               </h5>
               <p class="be-text-userblock">
                  {{ $data->descripcion }}
               </p>
            </div>
            <a href="blog-detail-2.html" class="be-button-vidget like-btn blue-style"><i class="fa fa-thumbs-o-up"></i>LIKE PROJECT</a>
            <a href="blog-detail-2.html" class="be-button-vidget add-btn grey-style"><i class="fa fa-file-o"></i>ADD TO COLLECTION</a>
           
		    <h3 class="letf-menu-article text-center">Fotos Recientes</h3>
             <div  class="swiper-container" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
               <div class="swiper-wrapper">
			    @foreach($sql_foto_escort as $foto) 
					<div class="swiper-slide">
						<div class="be-post">
							<a href="blog-detail-2.html" class="be-img-block">
							<img src ="/uploads_escorts/{{$foto->url_fotos}}" height="202" width="269" alt="omg">
							</a>
							<a href="#" class="be-post-title">{!! $foto->url_fotos !!}</a>
							<div class="info-block">
							<span><i class="fa fa-thumbs-o-up"></i> 253</span>
							<span><i class="fa fa-eye"></i> 753</span>
							<span><i class="fa fa-comment-o"></i> 50</span>
							</div>
						</div>
					</div>
                  @endforeach				 
                </div>
				<div class="pagination">

			  </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="be-fixed-filter"></div>
<div class="large-popup login">
   <div class="large-popup-fixed"></div>
   <div class="container large-popup-container">
      <div class="row">
         <div class="col-md-8 col-md-push-2 col-lg-6 col-lg-push-3  large-popup-content">
            <div class="row">
               <div class="col-md-12">
                  <i class="fa fa-times close-button"></i>
                  <h5 class="large-popup-title">Log in</h5>
               </div>
               <form action="./" class="popup-input-search">
                  <div class="col-md-6">
                     <input class="input-signtype" type="email" required="" placeholder="Your email">
                  </div>
                  <div class="col-md-6">
                     <input class="input-signtype" type="password" required="" placeholder="Password">
                  </div>
                  <div class="col-xs-6">
                     <div class="be-checkbox">
                        <label class="check-box">
                        <input class="checkbox-input" type="checkbox" value=""/> <span class="check-box-sign"></span>
                        </label>
                        <span class="large-popup-text">
                        Stay signed in
                        </span>
                     </div>
                     <a href="blog-detail-2.html" class="link-large-popup">Forgot password?</a>
                  </div>
                  <div class="col-xs-6 for-signin">
                     <input type="submit" class="be-popup-sign-button" value="SIGN IN">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="large-popup register">
   <div class="large-popup-fixed"></div>
   <div class="container large-popup-container">
      <div class="row">
         <div class="col-md-10 col-md-push-1 col-lg-8 col-lg-push-2 large-popup-content">
            <div class="row">
               <div class="col-md-12">
                  <i class="fa fa-times close-button"></i>
                  <h5 class="large-popup-title">Register</h5>
               </div>
               <form action="./" class="popup-input-search">
                  <div class="col-md-6">
                     <input class="input-signtype" type="text" required="" placeholder="First Name">
                  </div>
                  <div class="col-md-6">
                     <input class="input-signtype" type="text" required="" placeholder="Last Name">
                  </div>
                  <div class="col-md-6">
                     <div class="be-custom-select-block">
                        <select class="be-custom-select">
                           <option value="" disabled selected>
                              Country
                           </option>
                           <option value="">USA</option>
                           <option value="">Canada</option>
                           <option value="">England</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <input class="input-signtype" type="text" required="" placeholder="Email">
                  </div>
                  <div class="col-md-6">
                     <input class="input-signtype" type="text" required="" placeholder="Password">
                  </div>
                  <div class="col-md-6">
                     <input class="input-signtype" type="text" required="" placeholder="Repeat Password">
                  </div>
                  <div class="col-md-12 be-date-block">
                     <span class="large-popup-text">
                     Date of birth
                     </span>
                     <div class="be-custom-select-block mounth">
                        <select class="be-custom-select">
                           <option value="" disabled selected>
                              Mounth
                           </option>
                           <option value="">January</option>
                           <option value="">February</option>
                           <option value="">March</option>
                           <option value="">April</option>
                           <option value="">May</option>
                           <option value="">June</option>
                           <option value="">July</option>
                           <option value="">August</option>
                           <option value="">September</option>
                           <option value="">October</option>
                           <option value="">November</option>
                           <option value="">December</option>
                        </select>
                     </div>
                     <div class="be-custom-select-block">
                        <select class="be-custom-select">
                           <option value="" disabled selected>
                              Day
                           </option>
                           <option value="">1</option>
                           <option value="">2</option>
                           <option value="">3</option>
                           <option value="">4</option>
                           <option value="">5</option>
                           <option value="">6</option>
                           <option value="">7</option>
                           <option value="">8</option>
                           <option value="">9</option>
                           <option value="">10</option>
                           <option value="">11</option>
                           <option value="">12</option>
                           <option value="">13</option>
                           <option value="">14</option>
                           <option value="">15</option>
                           <option value="">16</option>
                           <option value="">17</option>
                           <option value="">18</option>
                           <option value="">19</option>
                           <option value="">20</option>
                           <option value="">21</option>
                           <option value="">22</option>
                           <option value="">23</option>
                           <option value="">24</option>
                           <option value="">25</option>
                           <option value="">26</option>
                           <option value="">27</option>
                           <option value="">28</option>
                           <option value="">29</option>
                           <option value="">30</option>
                        </select>
                     </div>
                     <div class="be-custom-select-block">
                        <select class="be-custom-select">
                           <option value="" disabled selected>
                              Year
                           </option>
                           <option value="">1996</option>
                           <option value="">1997</option>
                           <option value="">1998</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="be-checkbox">
                        <label class="check-box">
                        <input class="checkbox-input" type="checkbox" required="" value="" /> <span class="check-box-sign"></span>
                        </label>
                        <span class="large-popup-text">
                        I have read and agree to the <a class="be-popup-terms" href="blog-detail-2.html">Terms of Use</a> and <a class="be-popup-terms" href="blog-detail-2.html">Privacy Policy</a>.
                        </span>
                     </div>
                     <div class="be-checkbox">
                        <label class="check-box">
                        <input class="checkbox-input" type="checkbox" value="" /> <span class="check-box-sign"></span>
                        </label>
                        <span class="large-popup-text">
                        Send me notifications
                        </span>
                     </div>
                  </div>
                  <div class="col-md-6 for-signin">
                     <input type="submit" class="be-popup-sign-button" value="SIGN IN">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="large-popup send-m">
   <div class="large-popup-fixed"></div>
   <div class="container large-popup-container">
      <div class="row">
         <div class="col-md-10 col-md-push-1 col-lg-8 col-lg-push-2 large-popup-content">
            <div class="row">
               <div class="col-md-12">
                  <i class="fa fa-times close-m close-button"></i>
                  <h5 class="large-popup-title">Send message</h5>
               </div>
               <form action="./" class="popup-input-search">
                  <div class="col-md-6">
                     <input class="input-signtype" type="text" required="" placeholder="First Name">
                  </div>
                  <div class="col-md-6">
                     <input class="input-signtype" type="text" required="" placeholder="Last Name">
                  </div>
                  <div class="col-md-6">
                     <div class="be-custom-select-block">
                        <select class="be-custom-select">
                           <option value="" disabled selected>
                              Country
                           </option>
                           <option value="">USA</option>
                           <option value="">Canada</option>
                           <option value="">England</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <input class="input-signtype" type="email" required="" placeholder="Email">
                  </div>
                  <div class="col-md-12">
                     <textarea class="message-area" placeholder="Message"></textarea>
                  </div>
                  <div class="col-md-12 for-signin">
                     <input type="submit" class="be-popup-sign-button" value="SEND">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="theme-config">
   <div class="main-color">
      <div class="title">Main Color:</div>
      <div class="colours-wrapper">
         <div class="entry color1 m-color active" data-colour="style/stylesheet.css"></div>
         <div class="entry color3 m-color"  data-colour="style/style-green.css"></div>
         <div class="entry color6 m-color"  data-colour="style/style-orange.css"></div>
         <div class="entry color8 m-color"  data-colour="style/style-red.css"></div>
         <div class="title">Second Color:</div>
         <div class="entry s-color  active color10"  data-colour="style/stylesheet.css"></div>
         <div class="entry s-color color11"  data-colour="style/style-oranges.css"></div>
         <div class="entry s-color color12"  data-colour="style/style-greens.css"></div>
         <div class="entry s-color color13"  data-colour="style/style-reds.css"></div>
      </div>
   </div>
   <div class="open"><img src='{{ url("img/icon-134.png") }}' alt=""></div>
</div>
<!-- SCRIPTS	 -->
@endsection 

<script src='{{ url("js/jquery-2.1.4.min.js") }}'></script>
<script src='{{ url("js/jquery-ui.min.js") }}'></script> 
<script src='{{ url("js/viewer.js") }}'></script>
<script src='{{ url("js/bootstrap.min.js") }}'></script>
<script src='{{ url("js/idangerous.swiper.min.js") }}'></script>
<script src='{{ url("js/jquery.mixitup.js") }}'></script>
<script src='{{ url("js/jquery.viewportchecker.min.js") }}'></script> 
<!-- <script src='{{ url("js/filters.js") }}'></script!-->
<!--script src='{{ url("js/global.js") }}'></script!-->
<script  src='{{ url("assets/dist/js/tooltipster.bundle.min.js") }}'></script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js'></script!-->



<script>
   $( document ).ready(function() {
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
         event.preventDefault();
         $(this).ekkoLightbox();
      });
     // alert('foto');

         

   });
</script>