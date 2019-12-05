@extends('admin.layout')
@section('content')
<div class="box box-info">
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
   <div class="container">
    <div class="row">
       <div class="col-md-10">
            <form class="form-horizontal" action="{{ URL::to('admin/uploadvideo') }}" method="POST" enctype="multipart/form-data">
                <div class="box-body">
                <br><br>
                    <div class="form-group">
                    <h2>Subir Video:</h2>
                    <div class="col-sm-10">
                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        <div class="form-group">
                            <input type="file" name="video" id="video">
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-center">Subir</button>
                </div>
                <!-- /.box-footer -->
            </form>
         </div>
     </div>

      <div class="box-header with-border">
         <h3 class="box-title">Mi Video</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
         <table class="table table-bordered">
            <tr>
               <th style="width: 10px">#</th>
               <th>Nombre</th>
               <th>Acción</th>
            </tr>
            <tr>
               <td>1.</td>
               <td style="color:black">{{$clientes->desc_video ?? ''}} </td>
               <td>
                  <form action="{{ URL::to('admin/deletevideo') }}" method="POST" >
                     <input type="hidden" value="{{ csrf_token() }}" name="_token">
                     <input type="hidden" value="{{ $clientes->id_video ?? '' }}" name="id_video">
                     <input type="hidden" value="{{ $clientes->Id_escort ?? '' }}" name="escort_id">
                     <input type="hidden" value="{{ $clientes->desc_video ?? '' }}" name="descripcion_video">
                     <button type="submit" class="btn btn-danger" >Eliminar</button>
                  </form>
               </td>
            </tr>
         </table>
      </div>
   </div>
</div>
</div>
@endsection