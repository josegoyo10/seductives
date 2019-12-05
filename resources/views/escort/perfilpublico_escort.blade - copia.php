@extends('layout')

@section('content')
<div class="global indent">
   <!--content-->
   <div class="who-box">
      <div class="container">
         <div class="row">
            <div class="col-sm-4" style="color:#FFF;">
               <h2>{{ $data->apodo_escort }} </h2>
               <div class="thumb-pad4">
                  <div class="thumbnail"> 
                    
                     <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}"  class="img-responsive" alt="">
                       
                     <div class="caption">
                        <div class="row">
                           <div class="col-md-4" style="color:#FFFFFF;">Edad: {{ $data->edad }} años</div>
 
                           <div class="col-md-8" style="color:#FFFFFF;">Whatsapp: 
                           <a href="https://api.whatsapp.com/send?phone={{ str_replace('+', '', $telefono_whatsapp)}}&text=Hola he visto tu perfil y quiero que nos juntemos." 
                             class="btn btn-success" target="_blank">
                             <i class="fa fa-whatsapp" aria-hidden="true"></i>
                             </a>                 
                             
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-12" style="color:#FFFFFF;">Ubicación:  {{ $data->descripcion_region }}, {{ $data->descripcion_comuna  }}</div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-4" style="color:#FFFFFF;">Altura:  {{ $data->altura }}</div>
                           <div class="col-md-7" style="color:#FFFFFF;">Médidas: {{ $data->medidas }}</div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-6" style="color:#FFFFFF;">Atención:  {{ $data->atencion }}</div>
                           <div class="col-md-6" style="color:#FFFFFF;">Teléfono: {{ str_replace('+56', '', $telefono_escort) }}</div>
                           
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-12" style="color:#FFFFFF;">Días Disponible:  {{ $data->dias_disponibles }}</div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-5" style="color:#FFFFFF;">Precio:  {{ $precio_escort }}</div>
                           <div class="col-md-5" style="color:#FFFFFF;">Color de Piel:  &nbsp;{{ $data->color_piel }}</div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-12" style="color:#FFFFFF;">Servicios: 
                              @foreach ($servicio_escort as $row) 
                              @php
                              $array_services[] = ucfirst($row->nombre_servicio);
                              @endphp
                              @endforeach
                                @if (isset($array_services))
                                 {{   implode(',', $array_services)  }}
                               @endif
                           </div>
                        </div>
                        <hr>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-8 col-centered" style="color:#FFF;">
               <div class="col-lg-12">
                  <h2>Mi Galeria</h2>
                  <p>{{ $data->descripcion }}</p>
                  <div class="row">
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <div class="thumb-pad3 indent">
                           <div class="thumbnail">
                              <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}">
                                 <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}"  alt="" >
                                 </a>
                              </figure>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <div class="thumb-pad3 indent">
                           <div class="thumbnail">
                              <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_1) }}" >
                              <img src="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_1) }}"  alt=""></a></figure>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                        <div class="thumb-pad3 indent">
                           <div class="thumbnail">
                              <figure><a href="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_2) }}"><img src="{{ url('uploads/escort_fotos/'.$data->foto_secundaria_2) }}" alt=""></a></figure>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--col-12!-->
            </div>
            <!--second column !-->
         </div>
         <!--ROW!-->
      </div>
   </div>
   <div class="offer-box">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
               <h2>Our advantages</h2>
               <ul class="list1">
                  <li>
                     <span class="fa fa-thumbs-o-up"></span>
                     <div class="extra-wrap">
                        <p>Ut tellus dolor, dapibus eget, elementu m vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volut pat. Duis ac turpis. Integer rutrum ante eu lacus. Lorem ipsum dolor.</p>
                     </div>
                  </li>
                  <li>
                     <span class="fa fa-star"></span>
                     <div class="extra-wrap">
                        <p>Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacusa enean nonu.</p>
                     </div>
                  </li>
                  <li>
                     <span class="fa fa-comments"></span>
                     <div class="extra-wrap">
                        <p>Lorem ipsum dolor sit amet, con sectetuer adipiscing elit. Praesent vestibulum molestie lacusa enean nonu. mmy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi.</p>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12">
               <h2>Comentarios</h2>
               <div class="thumb-pad2">
                  <div class="thumbnail">
                     <figure><img src="{{ asset('img/page2_pic6.jpg') }}" alt=""></figure>
                     <div class="caption">
                        <p>&ldquo;Lorem ipsum dolor sit amet, contetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Elementum vel cursus eleifend elit. Aenean auctor wisi...&rdquo;</p>
                        <a href="#">JOHN MCCOIST</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js/jquery.ui.totop.js') }}"></script>
<script src="{{asset('js/touchTouch.jquery.js') }}"></script>
<script>
   $(window).load(function() {
     // Initialize the gallery
    $('.thumb-pad3 figure a').touchTouch();
   });
</script>
@endpush
</body>