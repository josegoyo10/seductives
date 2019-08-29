<?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('styles'); ?>
<body class="indent">
   <!--header-->
   <header class="indent">
      <em></em>
      <div class="container">
         <h1 class="navbar-brand navbar-brand_">
         <div class="boton-box col-lg-12">
            <a href="<?php echo e(route('registro_escort')); ?>" class="btn btn-danger btn-md" role="button">¿Eres Escort? Click aqui</a>
            <a href="<?php echo e(route('login')); ?>" class="btn btn-danger btn-md" role="button">Acceso</a>
         </div>
         <!-- <a href="index.html"><img src="images/img/sed.png" alt="logo" style="width:395px;"></a></h1> -->
         <div class="head_info wow fadeInLeft" data-wow-delay="0.25s">
            <p>Agenda tu Escort Favorita </p>
         </div>
         <br>
         <form id="search" class="search wow fadeInLeft" action="search.php" method="GET" accept-charset="utf-8">
            <input type="text" name="s" value="" onfocus="if (this.value == '') {this.value=''}" 
               onblur="if (this.value == '') {this.value=''}">
            <a href="#" onClick="document.getElementById('search').submit()">
            <img src="<?php echo e(asset('img/magnify2.png')); ?>" alt=""></a> 
         </form>
         <div class="clearfix"></div>
         <nav class="navbar navbar-default navbar-static-top tm_navbar clearfix indent wow fadeInUp" role="navigation" data-wow-delay="0.25s">
            <ul class="nav sf-menu clearfix">
               <li class="active"><a href="index.html">Inicio</a></li>
               <li class="sub-menu">
                  <a href="index-2.html">Categorias</a><span></span>
                  <ul class="submenu">
                     <li><a href="#">Maduras</a></li>
                     <li><a href="#">Lesbianas</a></li>
                     <li><a href="#">Bisexual</a></li>
                     <li><a href="#">Masajes</a></li>
                     <li><a href="#">Morenas</a></li>
                     <li><a href="#">Rubias</a></li>
                  </ul>
               </li>
               <li class="sub-menu">
                  <a href="index-2.html">Servicios</a><span></span>
                  <ul class="submenu">
                     <li><a href="#">Dama de Compañia</a></li>
                     <li><a href="#">Trios</a></li>
                     <li><a href="#">Despedida de Solteros</a></li>
                     <li><a href="#">Masajes</a></li>
                  </ul>
               </li>
               <li><a href="index-3.html">gallery</a></li>
               <li><a href="index-4.html">contacts</a></li>
            </ul>
         </nav>
      </div>
   </header>
   <div class="global">
      <!-- MAIN CONTENT -->
      <?php echo $__env->yieldContent('content'); ?>
      <!--content-->  
      <!--footer-->
      <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!--JS-->
     
      <?php echo $__env->make('scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->yieldPushContent('scripts'); ?>
   </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\seductives1\resources\views/layout.blade.php ENDPATH**/ ?>