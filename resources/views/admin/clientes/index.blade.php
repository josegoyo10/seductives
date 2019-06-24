@extends('admin.layout')
@section('header')

<h1>
   Todos los Clientes
   <small>Control panel</small>
</h1>
<ol class="breadcrumb">
   <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
   <li class="active">Clientes</li>
</ol>
@endsection
@section('content')


  @if (auth()->user()->hasRole('Usuario Basico'))
  
  <div class="container-fluid">
    
           @foreach($clientes as $row) 
           
             <div class="col-md-2">
              <div class="row">
                <div class="form-group">
              <!--div class="be-post"!-->
                        <a  class="be-img-block red-tooltip" id="modalEscort" data-show="tip" style="cursor:pointer"
                        data-target="#exampleModalCenter" data-id="{{ $row->id }}" 
                        data-toggle="modal"
                        data-original-title="<div class='row'>
                                                <div class='col-md-12'>
                                                   <div class='form-group'>
                                                      <p class='text-align:left;' style='font-size: 12px;'>
                                          <i class='fa fa-user-circle'></i> {{ $row->nombres}}
                                          </p>
                                                   </div>
                                                </div>
                                       </div>
                                       <div class='row'>
                                       <div class='col-md-12'>
                                          <div class='form-group'>
                                             <p class='text-align:left;'  style='font-size: 12px;'>
                                                <i class='fab fa-whatsapp'></i> {{ $row->telefono}}
                                             </p>
                                          </div>
                                          </div>
                                       </div>
                                                <div class='row'>
                                       <div class='col-md-12'>
                                             <div class='form-group'>
                                             <p class='text-align:left;' style='font-size: 12px;'>
                                                <i class='fa fa-map-marker'></i> {{ $row->comuna}}
                                             </p>
                                             </div>
                                                   </div>
                                                </div>
                                             " data-placement="bottom">
                         
                           <img src= "{{ url($row->foto_principal) }}" 
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

         $("body").tooltip({
            selector:'[data-show=tip]',
            animated: 'fade',
            html: true
            
            
         });

   });

</script>