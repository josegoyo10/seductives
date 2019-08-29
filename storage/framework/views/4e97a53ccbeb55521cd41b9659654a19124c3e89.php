<?php $__env->startSection('content'); ?>
<div class="global indent">
   <!--content-->
   <div class="container">
      <div class="row">
         <div class="col-xs-12">
            <div class="row">
               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                  <div class="thumb-pad3 indent">
                     <div class="thumbnail">
                        <figure>
                           <a href="escort_perfil/<?php echo e($row->id); ?>">
                           <img src="<?php echo e(url('uploads/escort_fotos/'.$row->foto_principal)); ?>"  alt=""></a>
                        </figure>
                        <div class="caption">
                           <a href="#"><?php echo e($row->apodo_escort); ?></a>
                           <p class="description"><?php echo e($row->edad); ?></p>
                           <p><?php echo e($row->descripcion_comuna); ?></p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <div class="col-lg-12 col-md-6 col-sm-6 list-box">
                  <p><a href="#">Todays</a>   <span>-</span>    <a href="#">A-level</a>   <span>-</span>   <a href="#">Busty</a>   <span>-</span>   <a href="#">English</a>   <span>-</span>   <a href="#">European</a>   <span>-</span>   <a href="#">All escorts</a>   <span>-</span>   <a href="#">Latest</a>  <span>-</span>   <a href="#">Top reviews</a>   <span>-</span>   <a href="#">$ 1500+</a></p>
               </div>
            </div>
         </div>
         <!--col-lg-12 !-->
      </div>
      <!--row !-->
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
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<!-- <?php $__env->startPush('scripts'); ?>
       <script src="<?php echo e(url('js/jquery.js')); ?>"></script>
        <script src="<?php echo e(url('js/jquery-migrate-1.2.1.min.js')); ?>"></script>
        <script src="<?php echo e(url('js/superfish.js')); ?>"></script>
        <script src="<?php echo e(url('js/jquery.easing.1.3.js')); ?>"></script>
        <script src="<?php echo e(url('js/jquery.mobilemenu.js')); ?>"></script>
        <script src="<?php echo e(url('js/jquery.equalheights.js')); ?>"></script>
        <script src="<?php echo e(url('js/jquery.flexslider.js')); ?>"></script>  
        <script src="<?php echo e(url('js/jquery.kwicks-1.5.1.js')); ?>"></script>
        <script src="<?php echo e(url('js/jquery.ui.totop.js')); ?>"></script>
        <script src="<?php echo e(url('js/wow/wow.js')); ?>"></script>
        <script src="<?php echo e(url('js/wow/device.min.js')); ?>"></script>
        <script>
            $(document).ready(function () {       
            if ($('html').hasClass('desktop')) {
                new WOW().init();
            }   
            });
        </script>
        <script src='<?php echo e(url("js/bootstrap.min.js")); ?>'></script>
        <script src="<?php echo e(url('js/tm-scripts.js')); ?>"></script>
<?php $__env->stopPush(); ?> -->
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives1\resources\views/welcome.blade.php ENDPATH**/ ?>