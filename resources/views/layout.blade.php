@include('header')
<body>
   <div class="containerx">
      <div id="barraTop">
         <div id="menuC1">
            <a href="{{ route('inicio')}}"> <img id="logoBarraTop" src="{{ asset('images/sedchico.png') }}"></a>
            <div class="pull-right offset-md-7" style="top:10px; position:absolute; right: 70px;">
               <a href="{{ route('registro_escort') }}" class="btn btn-danger btn-md" role="button">¿Eres Escort? Click aqui</a>
               <a href="{{ route('login') }}" class="btn btn-danger btn-md" role="button">Acceso</a>
            </div>
         </div>
      </div>
      <div id="cuerpoTopx">
        <a href="{{ route('inicio')}}"><img id="logoTop" src="{{ asset('images/logo2.png') }}"></a>
         <div id="noticias" class="fixed-bottom">
            <div id="titulos">
               <h1>Noticias</h1>
               <div class="div_novedades">
                  <div class="ticker1">
                     <div class="innerWrap be-user-statistic">
                        @if (!empty(($noticias)))
                        @foreach($noticias as $news)
                        @if (\Carbon\Carbon::parse($news->created_at)->format('Y-m-d') == $today)
                        <div class="demo">
                           <img src="{{ url('uploads/escort_fotos/'.$news->foto_principal) }}" class="img-circle" 
                              style="float: left; margin: 0px 5px 25px 0px;width:35px;">
                           <p class="parrafo" ><strong>{{ ($news->descripcion)}}</strong>
                           </p>
                        </div>
                        @endif
                        @endforeach
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="historias">
            <div id="titulos">
               <h1>
                  Historias
               </h1>
            </div>
            <
         </div>
      </div><br>
      <div class="text-center" style="margin-left:340px;">
         <div class="row">
            <div class="col-md-8 text-center">
               <form id="buscar" class="text-center"  action="{{ route('buscar_escort') }}" method="POST" accept-charset="utf-8">
               @csrf
                  <div class="input-group input-group-lg">
                     <input type="text" class="form-control" placeholder="Buscar Escort" id="search_escort" name="search_escort">
                     <div class="input-group-btn">
                        <a href="#"  class="btn btn-default" onClick="submitForm(event)">
                             <i class="glyphicon glyphicon-search"></i>
                        </a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <header class="indent">
         <div class="container">
            <div class="head_info wow fadeInLeft" data-wow-delay="0.25s">
               <h2>Encuentra tu Escort Favorita </h2>
            </div>
            <nav class="navbar navbar-default navbar-static-top tm_navbar clearfix indent wow fadeInUp" role="navigation" data-wow-delay="0.25s">
               <ul class="nav sf-menu clearfix">
                  <li class="active"><a href="{{ route('inicio')}}">Inicio</a></li>
                  <li class="sub-menu">
                     <a href="index-2.html">Categorias</a><span></span>
                     <ul class="submenu">
                        <li><a href="{!! route('listar_maduras', ['categoria'=>'maduras']) !!}">Maduras</a></li>
                        <li><a href="{!! route('listar_maduras', ['categoria'=>'lesbianas']) !!}">Lesbianas</a></li>
                        <li><a href="{!! route('listar_maduras', ['categoria'=>'travestis']) !!}">Travestis</a></li>
                        <li><a href="{!! route('listar_maduras', ['categoria'=>'gays']) !!}">Gays</a></li>
                     </ul>
                  </li>
                  <li class="sub-menu">
                     <a href="index-2.html">Servicios</a><span></span>
                     <ul class="submenu">
                        <li><a href="{!! route('listar_servicios', ['servicios'=>'13']) !!}">Dama de Compañia</a></li>
                        <li><a href="{!! route('listar_servicios', ['servicios'=>'14']) !!}">Trios</a></li>
                        <li><a href="{!! route('listar_servicios', ['servicios'=>'9']) !!}">Despedida de Solteros</a></li>
                        <li><a href="{!! route('listar_servicios', ['servicios'=>'5']) !!}">Masajes</a></li>
                     </ul>
                  </li>
                  <li><a href="index-4.html">Foro</a></li>
                  </form>
               </ul>
               <!-- <div style="position:absolute; margin-left:860px;top:15px;">
                  <form id="buscar" class="form-inline" action="{{ route('buscar_escort') }}" method="POST" accept-charset="utf-8">
                  @csrf
                  <div class="form-group" style="margin-left:-130px;">
                     <label for="focusedInput"></label>
                     <input class="form-control" id="search_escort" name="search_escort" type="text" placeholder="Introduzca el Nombre">
                     <a href="#" onClick="document.getElementById('buscar').submit()">
                     <i class="glyphicon glyphicon-search"></i>
                     </a>
                  </div>
               </div> -->
            </nav>
         </div>
      </header>
      <div class="container">
         <div id="cuerpo2">
            @yield('content')
         </div>
         @include('scripts')
         @stack('scripts')
      </div>
    
   </div>
   @include('footer')
</body>
<script src='{{ url("js/jquery.easy-ticker.js") }}'></script>
<script>

function submitForm(event){
        event.preventDefault();
        document.getElementById('buscar').submit();


    }
  
   $( document ).ready(function() {
   
            $('.ticker1, .ticker2').easyTicker({
                  direction: 'up',
                  easing: 'swing',
                  speed: 'slow',
                  interval: 2000,
                  height: 'auto',
                  visible: 0,
                  mousePause: 1,
                  controls: {
                     up: '',
                     down: '',
                     toggle: '',
                     playText: 'Play',
                     stopText: 'Stop'
                  }
            });

            $('#btnSearch').submit(function(e){
                  $.ajax({
                  url: $(this).attr('action'),
                  data : $(this).serialize(),
                  method:"POST",
                  success : function (data){

                     }
                  });
                  e.preventDefault();
               });

         
          
   });
</script>
</body>
</html>