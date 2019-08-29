<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <?php if(\Session::has('success')): ?>
         <div class="alert alert-success">
            <ul>
               <li><?php echo \Session::get('success'); ?></li>
            </ul>
         </div>
         <?php endif; ?>
         <div class="card">
            <div class="card-header" style="background:#000000;color:#ffffff;"> Acceso</div>
            <div class="card-body">
               <form method="POST" action="<?php echo e(route('login')); ?>">
                  <?php echo csrf_field(); ?>
                  <div class="form-group row">
                     <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Correo')); ?></label>
                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                        <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                        <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Contraseña')); ?></label>
                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="current-password">
                        <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                        <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                     </div>
                  </div>
                  <div class="form-group row<?php echo e($errors->has('CaptchaCode') ? ' has-error' : ''); ?>">
                     <label class="col-md-4 control-label"></label> 
                     <div class="col-md-6 offset-md-4"> 
                        <?php echo captcha_image_html('LoginCaptcha'); ?> 
                        <input type="text" class="form-control" name="CaptchaCode" id="CaptchaCode"> 
                        <?php if($errors->has('CaptchaCode')): ?> 
                        <span class="help-block" style="color:#d91b0d;"> 
                        <strong><?php echo e($errors->first('CaptchaCode')); ?></strong> 
                        </span> 
                        <?php endif; ?> 
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                           <label class="form-check-label" for="remember">
                           <?php echo e(__('Recuerdame')); ?>

                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row mb-0">
                     <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary" 
                           style="background-color:#000000;border-color:#000000;">
                        <?php echo e(__('Acceso')); ?>

                        </button>
                        <?php if(Route::has('password.request')): ?>
                        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>" style="color:#000000;" >
                        <?php echo e(__('Olvidaste tu Contraseña?')); ?>

                        </a>
                        <?php endif; ?>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\seductives\resources\views/auth/login.blade.php ENDPATH**/ ?>