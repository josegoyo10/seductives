<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="display-comment" id="commentId_<?php echo e($comment->id); ?>" <?php if($comment->parent_id != null): ?> style="margin-left:40px;" <?php endif; ?> >
   <div class="be-comment">
   <!-- <div class="be-img-comment">	
      <a href="blog-detail-2.html">
      <img src="<?php echo e(url('img/c1.png')); ?>" alt="" class="be-ava-comment">
      </a> 
      </div> -->
   <div class="be-comment-content">
      <span class="be-comment-name">
      <img src="<?php echo e(url('img/avatar-user.png')); ?>" alt="" style="max-width: 45px;" class="be-ava-comment"> <strong><?php echo e($comment->user->name); ?></strong>
      </span>
      <span class="be-comment-time">
      <i class="fa fa-clock-o"></i>
      <?php echo e(Carbon\Carbon::parse($comment->created_at)->format('d-m-Y i')); ?>

      </span>
      <p class="be-comment-text">
         <?php if(Auth::user()->id_tipo_usuario == 1): ?>
               <?php
                 $button = Form::button('<i class="fa fa-remove" data-comment=""></i> Eliminar', array('class' => 'btn btn-danger', 'type' => 'submit','dataiD-comment'=> $comment->id  ));
                ?>
         <?php else: ?>
                <?php
                   $button = '';
                   ?>
          <?php endif; ?>
          <span> <?php echo e($comment->body); ?>  <?php echo $button; ?></span>  
      </p>
   </div>
</div>
<a href="" id="reply"></a>
<form method="post" action="<?php echo e(route('comments.store')); ?>">
   <?php echo csrf_field(); ?>
   <div class="form-group">
      <textarea class="form-control" name="body" rows="3"></textarea>
      <input type="hidden" name="escort_id" value="<?php echo e($escort_id); ?>" />
      <input type="hidden" name="parent_id" value="<?php echo e($comment->id); ?>" />
   </div>
   <div class="form-group">
      <input type="submit" class="btn color-4" value="Responder" 
         style="background: #FFE924;"/>
   </div>
</form>
<?php echo $__env->make('admin.escort_register.commentsDisplay', ['comments' => $comment->replies], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!---Scripts !-->
<script src="<?php echo e(asset('js/jquery-2.1.4.min.js')); ?>"></script>
<script>
   $(document).ready(function(){
   
      $("#divMsjEliminar").hide();
         $(".btn-danger").click(function(event) {
               
               event.preventDefault();
   
               var idComment = $(this).attr('dataiD-comment');
   
               $.ajax({
                   type: "get",
                   url: '<?php echo e(url("admin/delete/comments")); ?>',
                   data: {
                      uid: idComment
                      
                      },
                      success: function (data) {
                       
                        $("#divMsjEliminar").show();
                        $("#commentId_" + idComment).hide(); 
                        $("#comentarioCount").html(data);
                        $("#divMsjEliminar").fadeOut(5000);
                        
                        // setTimeout(function() {
                        //    $("#divMsjEliminar").show();
                        //     location.reload();
                        // }, 1500);
                                                
                   }
   
               });
   
   
   
        });
   
   });
</script><?php /**PATH C:\xampp\htdocs\seductives\resources\views/admin/escort_register/commentsDisplay.blade.php ENDPATH**/ ?>