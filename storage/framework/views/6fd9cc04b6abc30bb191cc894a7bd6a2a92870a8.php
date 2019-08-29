        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
   
        <link href="<?php echo e(asset('css/plantilla.css')); ?>" rel="stylesheet"> <!--Añadimos el css generado con webpack-->
        <link rel="stylesheet" href='<?php echo e(url("css/star-rating.css")); ?>'>
        <!-- <link rel="stylesheet" href='<?php echo e(url("css/base.css")); ?>'> -->
        <link rel="stylesheet" href='<?php echo e(url("adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css")); ?>'>
    <?php $__env->startSection('content'); ?>
            <div id="app" ><!--La equita id debe ser app, como hemos visto en app.js-->
                <rating-component></rating-component><!--Añadimos nuestro componente vuejs-->
            </div>
        <script src="<?php echo e(asset('js/app.js')); ?>"></script> <!--Añadimos el js generado con webpack, donde se encuentra nuestro componente vuejs-->
    <?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/escort_register/calificar.blade.php ENDPATH**/ ?>