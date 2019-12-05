<div class="box">
            <div class="box-header">
               <h3 class="box-title">Listado de todos los Clientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="cliente-table" class="table table-bordered table-striped">
                  <thead>
                     <tr>
                        <th width="10%" style="font-size:14px;">Run</th>
                        <th width="15%" style="font-size:14px;">Nombres</th>
                        <th width="30%" style="font-size:14px;">Email</th>
                        <th width="14%" style="font-size:14px;">Fecha Nacimiento</th>
                        <th width="12%" style="font-size:14px;">Nacionalidad</th>
                        <th width="10%" style="font-size:14px;">Estado</th>
                        <th width="9%" style="font-size:14px;">Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($clientes as $cliente)
                     <tr>
                        <td width="10%">{{ $cliente->rut }}</td>
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