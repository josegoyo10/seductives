@foreach($comments as $comment)
<div class="display-comment" id="commentId_{{ $comment->id }}" @if($comment->parent_id != null) style="margin-left:40px;" @endif >
   <div class="be-comment">
   <!-- <div class="be-img-comment">	
      <a href="blog-detail-2.html">
      <img src="{{ url('img/c1.png') }}" alt="" class="be-ava-comment">
      </a> 
      </div> -->
   <div class="be-comment-content">
      <span class="be-comment-name">
      <img src="{{ url('img/avatar-user.png') }}" alt="" style="max-width: 45px;" class="be-ava-comment"> <strong>{{ $comment->user->name }}</strong>
      </span>
      <span class="be-comment-time">
      <i class="fa fa-clock-o"></i>
      {{ Carbon\Carbon::parse($comment->created_at)->format('d-m-Y i') }}
      </span>
      <p class="be-comment-text">
         @if (Auth::user()->id_tipo_usuario == 1)
               @php
                 $button = Form::button('<i class="fa fa-remove" data-comment=""></i> Eliminar', array('class' => 'btn btn-danger', 'type' => 'submit','dataiD-comment'=> $comment->id  ));
                @endphp
         @else
                @php
                   $button = '';
                   @endphp
          @endif
          <span> {{ $comment->body }}  {!! $button  !!}</span>  
      </p>
   </div>
</div>
<a href="" id="reply"></a>
<form method="post" action="{{ route('comments.store') }}">
   @csrf
   <div class="form-group">
      <textarea class="form-control" name="body" rows="3"></textarea>
      <input type="hidden" name="escort_id" value="{{ $escort_id }}" />
      <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
   </div>
   <div class="form-group">
      <input type="submit" class="btn color-4" value="Responder" 
         style="background: #FFE924;"/>
   </div>
</form>
@include('admin.escort_register.commentsDisplay', ['comments' => $comment->replies])
</div>
@endforeach
<!---Scripts !-->
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script>
   $(document).ready(function(){
   
      $("#divMsjEliminar").hide();
         $(".btn-danger").click(function(event) {
               
               event.preventDefault();
   
               var idComment = $(this).attr('dataiD-comment');
   
               $.ajax({
                   type: "get",
                   url: '{{url("admin/delete/comments")}}',
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
</script>