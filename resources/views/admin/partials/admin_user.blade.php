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