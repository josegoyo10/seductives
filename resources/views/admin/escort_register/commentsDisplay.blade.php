@foreach($comments as $comment)
<div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>

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
        {{ $comment->body }}
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