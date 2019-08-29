<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(url('css/icon.css')); ?>">
<link rel="stylesheet" href='<?php echo e(url("css/stylesheet.css")); ?>'>
<link rel="stylesheet" href='<?php echo e(url("css/idangerous.swiper.css")); ?>'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href='<?php echo e(url("css/albery.css")); ?>' type="text/css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- MAIN CONTENT -->
<div id="content-block">
   <div class="container custom-container be-detail-container">
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
      <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary btn-md" role="button" 
       style="background-color:#000000;border-color:#000000;"> Regresar</a>
      <div class="row">
         <div class="col-md-9 col-md-push-3" style="border: 1px solid #d8d6d6;border-radius: 10px 30px;">
            <div class="be-large-post">
               <div class="info-block">
                  <div class="be-large-post-align">
                     <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                     <span><i class="fa fa-comment-o"></i> 50</span>
                  </div>
               </div>
               <div class="blog-content popup-gallery be-large-post-align">
                  
                  <h5 class="be-post-title to">
                     <?php echo e($query->edad); ?> años, <i class='fa fa-whatsapp' style="color:#3fff00"></i> <?php echo e($query->telefono); ?>

                  </h5>
                  <span class="be-text-tags">
                  <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>, 
                  <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                  <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>
                  </span>
                  <div class="clear"></div>
                  <div class="contenido">
                     <div class="albery-container">
                        <div class="albery-wrapper">
                           <div class="albery-item">
                              <img src="<?php echo e(url('uploads/escort_fotos/'.$query->foto_secundaria_2)); ?>?image=655"/>
                           </div>
                           <div class="albery-item">
                              <img src="<?php echo e(url('uploads/escort_fotos/'.$query->foto_secundaria_1)); ?>?image=656"/>
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
            <div class="row">
            </div>
            <div class="be-comment-block">
               <?php if($sql_follow_escort != null): ?>
               <?php if($sql_follow_escort->status_invitacion == 2): ?>         
               <h1 class="comments-title">Comentarios (<?php echo $count; ?>)</h1>
               <?php echo $__env->make('admin.escort_register.commentsDisplay', ['comments' => $comentarios, 'escort_id' => $query->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               <h4>Añadir Comentario:</h4>
               <form method="POST" action="<?php echo e(route('comments.store' )); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="form-group">
                     <textarea class="form-control" name="body" rows="3"></textarea>
                     <input type="hidden" name="escort_id" value="<?php echo e($query->id); ?>" />
                  </div>
                  <div class="form-group"> 
                     <input type="submit" class="btn color-1"  style="padding-top:10px"
                        value="Añadir Comentario" />
                  </div>
               </form>
               <?php endif; ?> 
               <?php endif; ?>
            </div>
         </div>
         <div class="col-md-3 col-md-pull-9 left-feild">
            <div class="be-user-block">
               <div class="be-user-detail">
                  <a class="be-ava-user" >
                  <img src="<?php echo e(url('uploads/escort_fotos/'.$query->foto_principal)); ?>" alt="" class="img-circle"> 
                  </a>  
                  <p class="be-use-name"><?php echo e($query->apodo_escort); ?></p>
                  <span class="be-user-info">
                  <?php echo e($query->descripcion_comuna); ?>,<?php echo e($query->descripcion_region); ?>

                  </span>
               </div>
               <h5 class="be-title">
                  Sobre Mi
               </h5>
               <p class="be-text-userblock">
                  <?php echo e($query->descripcion_servicio); ?>

               </p>
            </div>
            <?php if(!empty($sql_follow_escort->status_invitacion)): ?>
            <?php if(($sql_follow_escort->status_invitacion == 0) || ($sql_follow_escort->status_invitacion == NULL)): ?>
            <a href="#" class="be-user-activity-button be-follow-type "  
               id="follow" data-id = "<?php echo e($query->id); ?>" data-action="follow">
            <i class="fa fa-thumbs-o-up"></i> SIGUEME
            </a>
            <?php endif; ?>
            <?php if($sql_follow_escort->status_invitacion == 1): ?>
            <a href="#"  id="invitationFollow" 
               data-id = "<?php echo e($query->id); ?>" data-action="pending"
               class="be-user-activity-button be-follow-type pending_button" >
               <i class="fa fa-clock-o"></i>
               <p style="color:#FFF;"> PENDIENTE</p>
            </a>
            <?php endif; ?>
            <?php if($sql_follow_escort->status_invitacion == 2): ?>
            <a href="#"  id="unfollow" 
               data-id = "<?php echo e($query->id); ?>" data-action="unfollow"
               class="be-user-activity-button be-follow-type unfollow_button" >
               <i class="fa fa-check-square" style="color:#FFF;"></i>
               <p style="color:#FFF;"> SIGUIENDO</p>
            </a>
            <?php endif; ?>
            <?php else: ?>
            <a href="#" class="be-user-activity-button be-follow-type "  
               id="follow" data-id = "<?php echo e($query->id); ?>" data-action="follow">
            <i class="fa fa-thumbs-o-up"></i> SIGUEME
            </a>
            <?php endif; ?>
            <!--botones !-->
            <div id="btnInvitationFollow" style="display:none;">
               <a href="#"  id="invitationFollow" 
                  data-id = "<?php echo e($query->id); ?>" data-action="pending"
                  class="be-user-activity-button be-follow-type pending_button" >
                  <i class="fa fa-clock-o"></i>
                  <p style="color:#FFF;"> PENDIENTE</p>
               </a>
            </div>
            <div id="btnunfollow" style="display:none;">
               <a href="#"  id="unfollow" 
                  data-id = "<?php echo e($query->id); ?>" data-action="unfollow"
                  class="be-user-activity-button be-follow-type unfollow_button" >
                  <i class="fa fa-clock-o"></i>
                  <p style="color:#FFF;"> SIGUIENDO</p>
               </a>
            </div>
            <h3 class="letf-menu-article text-center">Ultimas Fotos</h3>
            <div  class="swiper-container" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <div class="be-post">
                        <a href="blog-detail-2.html" class="be-img-block">
                        <img src="<?php echo e(url('img/p9.jpg')); ?>" height="202" width="269" alt="omg">
                        </a> 
                       
                        <span>
                        </span>
                      
                        <!-- <div class="info-block">
                           <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                           <span><i class="fa fa-eye"></i> 753</span>
                           <span><i class="fa fa-comment-o"></i> 50</span>
                        </div> -->
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="be-post">
                        <a href="blog-detail-2.html" class="be-img-block">
                        <img src ="<?php echo e(url('img/p9.jpg')); ?>" height="202" width="269" alt="omg">
                        </a>
                        <!--a href="blog-detail-2.html" class="be-post-title">NAHA Finalist Hairstylist of the Year Allen Ruiz</a>
                       <span>
                        <a href="blog-detail-2.html" class="be-post-tag">Art direction</a>, 
                        <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>,  
                        <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>
                        </span> -->
                        <!-- <div class="author-post">
                           <img src="<?php echo e(url('img/ava.png')); ?>" alt="" class="ava-author">
                           <span>by <a href="blog-detail-2.html">Daniel Ng</a></span>
                        </div>
                        <div class="info-block">
                           <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                           <span><i class="fa fa-eye"></i> 753</span>
                           <span><i class="fa fa-comment-o"></i> 50</span>
                        </div> -->
                     </div>
                  </div>
                  <!-- <div class="swiper-slide">
                     <div class="be-post">
                        <a href="blog-detail-2.html" class="be-img-block">
                        <img src="<?php echo e(url('img/p9.jpg')); ?>" height="202" width="269" alt="omg">
                        </a> 
                        <a href="blog-detail-2.html" class="be-post-title">NAHA Finalist Hairstylist of the Year Allen Ruiz</a>
                        <span>
                        <a href="blog-detail-2.html" class="be-post-tag">Art direction</a>, 
                        <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>,  
                        <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>
                        </span>
                        <div class="author-post">
                           <img src="<?php echo e(url('img/ava.png')); ?>" alt="" class="ava-author">
                           <span>by <a href="blog-detail-2.html">Daniel Ng</a></span>
                        </div>
                        <div class="info-block">
                           <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                           <span><i class="fa fa-eye"></i> 753</span>
                           <span><i class="fa fa-comment-o"></i> 50</span>
                        </div>
                     </div>
                     </div> -->
                  <!-- <div class="swiper-slide">
                     <div class="be-post">
                        <a href="blog-detail-2.html" class="be-img-block">
                        <img src="<?php echo e(url('img/p9.jpg')); ?>" height="202" width="269" alt="omg">
                        </a> 
                        <a href="blog-detail-2.html" class="be-post-title">NAHA Finalist Hairstylist of the Year Allen Ruiz</a>
                        <span>
                        <a href="blog-detail-2.html" class="be-post-tag">Art direction</a>, 
                        <a href="blog-detail-2.html" class="be-post-tag">Web Design</a>,  
                        <a href="blog-detail-2.html" class="be-post-tag">Interactiob design</a>
                        </span>
                        <div class="author-post">
                           <img src="<?php echo e(url('img/ava.png')); ?>" alt="" class="ava-author">
                           <span>by <a href="blog-detail-2.html">Daniel Ng</a></span>
                        </div>
                        <div class="info-block">
                           <span><i class="fa fa-thumbs-o-up"></i> 253</span>
                           <span><i class="fa fa-eye"></i> 753</span>
                           <span><i class="fa fa-comment-o"></i> 50</span>
                        </div>
                     </div>
                     </div> -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<!-- SCRIPTS	 -->
<script src="<?php echo e(asset('js/jquery-2.1.4.min.js')); ?>"></script>
<!-- <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script> -->
<!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script> -->
<script src="<?php echo e(asset('js/albery.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>		 -->
<!-- <script src="<?php echo e(asset('js/idangerous.swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/isotope.pkgd.min.js')); ?>"></script>	 -->
<!-- <script src="<?php echo e(asset('js/jquery.viewportchecker.min.js')); ?>"></script>	 -->
<!-- <script src="<?php echo e(asset('js/global.js')); ?>"></script> -->
<script>
   $.noConflict();
     jQuery(document).ready(function( $ ) {
     
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
                       url: '<?php echo e(url("admin/follow/escort")); ?>',
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
    
    });
    
    
</script>
<script type="text/javascript">
   var _gaq = _gaq || [];
   _gaq.push(['_setAccount', 'UA-36251023-1']);
   _gaq.push(['_setDomainName', 'jqueryscript.net']);
   _gaq.push(['_trackPageview']);
   
   (function() {
     var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
     ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
   })();
   
</script>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/escort_register/index.blade.php ENDPATH**/ ?>