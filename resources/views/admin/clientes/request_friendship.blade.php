@extends('admin.layout')
@section('content')
<div class="box box-info">
   <div class="box-header with-border">
      <h3 class="box-title">Solicitudes de Amistad</h3>
   </div>
   <!-- /.box-header -->
   <!-- form start -->
   @if (Session::has('errors'))
   <div class="alert alert-danger" role="alert">
      @if($errors->any())
      <h4>{{$errors->first()}}</h4>
      @endif
   </div>
   @endif
   @if (\Session::has('success'))
   <div class="alert alert-success">
      <ul>
         <li>{!! \Session::get('success') !!}</li>
      </ul>
   </div>
   @endif 

  @foreach ($list_friendship as $row) 

             @if ($row->status_invitacion == 1)
               <div class="box-header with-border">
                  <div class="col-sm-4">
                     <p class="text">{!! $row->name !!} {!! $row->last_name !!}</p>
                  </div>
                  <div class="col-sm-2 col-md-offset-2">
                      <form class="form-horizontal" action="{{ URL::to('admin/confirmfriendship') }}" method="POST" >
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <input type="hidden" value="{{  $row->sender_id }}" name="id_usuario">
                        <input type="hidden" value="{{  $row->receiver_id }}" name="id_escort">
                        <button type="submit" class="btn btn-primary">Confirmar Amistad</button>
                    </form>
                  </div>

                  <div class="col-sm-4">
                     <button type="submit" class="btn btn-default">Eliminar Solicitud
                     </button>
                  </div>
                  <!-- /.box-body -->
               </div>
            @endif
     @endforeach
</div>
</div>
@endsection