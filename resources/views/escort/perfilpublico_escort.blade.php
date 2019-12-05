@extends('layout')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-4">
         <div class="text-center">
            <h2 class="text-center">{{ $data->apodo_escort }} </h2>
            <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}"  class="rounded" alt="">
         </div>
         <br>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-4" style="color:#FFFFFF;">Edad: {{ $data->edad }} años</div>
            <div class="col-md-8" style="color:#FFFFFF;">Whatsapp: 
               <a href="https://api.whatsapp.com/send?phone={{ str_replace('+', '', $telefono_whatsapp)}}&text=Hola he visto tu perfil y quiero que nos juntemos." 
                  class="btn btn-success" target="_blank">
               <i class="fa fa-whatsapp" aria-hidden="true"></i>
               </a>                 
            </div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">Ubicación:  {{ $data->descripcion_region }}, {{ $data->descripcion_comuna  }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-4" style="color:#FFFFFF;">Altura:  {{ $data->altura }}</div>
            <div class="col-md-7" style="color:#FFFFFF;">Médidas: {{ $data->medidas }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-6" style="color:#FFFFFF;">Atención:  {{ $data->atencion }}</div>
            <div class="col-md-6" style="color:#FFFFFF;">Teléfono: {{ str_replace('+56', '', $telefono_escort) }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">Días Disponible:  {{ $data->dias_disponibles }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:0px;">
            <div class="col-md-5" style="color:#FFFFFF;">Precio:  {{ $precio_escort }}</div>
            <div class="col-md-6" style="color:#FFFFFF;">Color de Piel:  &nbsp;{{ $data->color_piel }}</div>
         </div>
         <hr>
         <div class="row" style="margin-left:2px;">
            <div class="col-md-12" style="color:#FFFFFF;">Servicios:
            <br>
               @foreach ($servicio_escort as $row)

               <ul class="fa-ul">
                   <li><span class="fa-li"><i class="fa fa-check-square"></i></span>{{ $row->nombre_servicio }}</li>
 
               </ul>
               @endforeach
               <!-- @php
                   $array_services[] = ucfirst($row->nombre_servicio);
               @endphp
         
               @if (isset($array_services))
                  
              
              {{   implode(',', $array_services)  }}
               @endif -->
            
              
            </div>
         </div>
         <hr>
      </div>
      <div class="col-sm-5" style="margin-left:60px; padding-top:40px;">
         
            <div class="panel panel-default">
               <div class="panel-heading">Sobre Mi</div>
                  <div class="panel-body"> <p>{{ $data->descripcion }}</p></div>
               </div>
           
            
            <div class="panel panel-default">
               <div class="panel-heading">Comentarios</div>
                  <div class="panel-body"> <p>{{ $data->descripcion }}</p></div>
               </div>
            </div>

         </div>
     </div>

   <div class="row" style="margin-left:0px;">
      <div class="col-xs-3" >
         <div class="thumbnail">
            <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}">
               <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}"  alt=""  style="width:100%;">
               </a>
            </figure>
         </div>
      </div>
      <div class="col-xs-3">
         <div class="thumbnail">
            <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_1) }}">
               <img src="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_1) }}"  alt=""  style="width:100%;">
               </a>
            </figure>
         </div>
      </div>
      <div class="col-xs-3">
         <div class="thumbnail">
            <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_2) }}">
               <img src="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_2) }}"  alt=""  
                  style="width:100%">
               </a>
            </figure>
         </div>
      </div>
      <br>
   </div>
   <!--row !-->  
</div>
<!--Container !-->
@endsection
@push('scripts')
<script src="{{asset('js/jquery.ui.totop.js') }}"></script>
<script src="{{asset('js/touchTouch.jquery.js') }}"></script>
<script>
   $(window).load(function() {
     // Initialize the gallery
    $('.thumbnail figure a').touchTouch();
   });
</script>
@endpush
</body>