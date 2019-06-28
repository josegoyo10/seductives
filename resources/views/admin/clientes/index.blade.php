@extends('admin.layout')

   @section('header')
  
   @if (auth()->user()->hasRole('Admin'))
         <h1>
            Todos las Clientes
            <small>Control panel</small>
         </h1>
         <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Clientes</li>
         </ol>
    @endif
   @endsection

   @section('css')
      <link rel="stylesheet" href="{{url('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{url('css/icon.css') }}">
      <link rel="stylesheet" href='{{url("css/loader.css") }}'>
      <link rel="stylesheet" href='{{url("css/idangerous.swiper.css") }}'>
      <link rel="stylesheet" href='{{url("css/jquery-ui.css") }}'>
      <link rel="stylesheet" href='{{url("css/stylesheet.css")}}'>
      <link rel="stylesheet" href='{{url("css/magnific.css")}}'>

	  <!-- DataTables -->
  <link rel="stylesheet" href='{{url("adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}'>

   @endsection

   @section('content')


  @if (auth()->user()->hasRole('USUARIO REGISTRADO'))
  
  <div class="container-fluid">
    
           @foreach($clientes as $row) 
           
             <div class="col-md-2">
              <div class="row">
                <div class="form-group">
              <!--div class="be-post"!-->
                        <a href="escort_perfil_register/{{$row->id }}" class="be-img-block red-tooltip escort" id="modalEscort" data-show="tip" style="cursor:pointer"
                        data-target="#exampleModalCenter" data-show="tip" style="cursor:pointer" data-id="{{ $row->id }}" 
                        data-toggle="modal"
                        data-original-title="<div class='row'>
                                                <div class='col-md-12'>
                                                   <div class='form-group'>
                                                      <p class='text-align:left;' style='font-size: 11px;'>
                                          <i class='fa fa-user-circle'></i> {{ $row->nombres}}
                                          </p>
                                                   </div>
                                                </div>
                                       </div>
                                       <div class='row'>
                                       <div class='col-md-12'>
                                          <div class='form-group'>
                                             <p class='text-align:left;'  style='font-size: 11px;'>
                                             <i class='fa fa-whatsapp'></i> {{ trim($row->telefono) }}
                                             </p>
                                          </div>
                                          </div>
                                       </div>
                                                <div class='row'>
                                       <div class='col-md-12'>
                                             <div class='form-group'>
                                             <p class='text-align:left;' style='font-size: 11px;'>
                                             <i class='fa fa-map-marker'></i> {{ $row->descripcion_comuna}}
                                             </p>
                                             </div>
                                                   </div>
                                                </div>
                                             " data-placement="bottom">
                                    <!--{{ url($row->foto_principal) }} !-->
                           <img src= "#" 
                        alt="omg" style="width:130px; heigth:117px;margin:0 auto;" class="centrar">
                           <span title="The tooltip" data-toggle="tooltip" data-placement="top" ></span>
                        </a>
                     </span>

                        <!--a href="page1.html" class="be-post-title" style="font-size:10px;">{{ $row->nombres }}</a>
                        <span>
                        <a href="blog-detail-2.html" class="be-post-tag"></a>, 
                        <a href="blog-detail-2.html" class="be-post-tag">UI/UX</a>,  
                        <a href="blog-detail-2.html" class="be-post-tag">Web Design</a> -->
                        <!--/span>
                      <-/div!-->

               </div>
              </div>
            </div>

           @endforeach
        </div>

    @else

         <div class="box">
            <div class="box-header">
               <h3 class="box-title">Listado de todos los Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="cliente-table" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th>Run</th>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Fecha Nacimiento</th>
                        <th>Nacionalidad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($clientes as $cliente)
                     <tr>
         

                        <td>{{ $cliente->rut }}</td>
                        <td>{{ $cliente->nombres }} {{ $cliente->apellidos }} </td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->fecha_nacimiento }}</td>
                        <td>{{ $cliente->nacionalidad }}</td>
                        <td>{!! $cliente->descripcion_estado  !!}</td>
                        <td> 
                           <a href="{{ route('admin.clientes.info',$cliente->id) }}" class="btn btn-primary">Ver</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- /.box-body -->
         </div>
       


  @endif
@stop
   <script src="/js/jquery-2.1.4.min.js"></script>
   <!--script src="/js/bootstrap.min.js"></script!-->
  
<script>
     $(document).ready(function(){

            $('.escort').click(function(event){
                     event.stopPropagation();
               });


               $("body").tooltip({
                  selector:'[data-show=tip]',
                  animated: 'fade',
                  html: true
                  
                  
               });


      });

</script>