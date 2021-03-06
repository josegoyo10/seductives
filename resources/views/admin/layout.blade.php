@include('admin.header')
<body>
  
   <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
         </div>
         <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
               <li class="active"><a href="#">Seductives</a></li>
               <li><a href="#">Contactanos</a></li>
               @if (auth()->user()->hasRole('Admin'))
                  <li><a href="{{ url('admin/ver-clientas') }}">Ver todas las Clientas</a></li>
               @endif

               @if (Auth::user()->id_tipo_usuario == 1) <!--Escorts !-->

                  <li>
                     <a href="{{ url('admin/escort-acciones') }}"><i class="fa fa-pencil"></i> Ver Mi Perfil</a>
                  </li>

                  <li>
                     <a href="{{ route('admin.clientes.video') }}"><i class="fa fa-file-video-o"></i> Subir Video</a>
                  </li>
               @endif
            
            </ul>
            <ul class="nav navbar-nav navbar-right">
               <li> <a href="#">  {{ ucfirst(auth()->user()->name) }} </a></li>
               <li>
                  <a  href="{{ route('logout') }}" 
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit(); ">Salir
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
               </li>
            </ul>
            </li>
            </ul>
         </div>
         <!--/.nav-collapse -->
      </div>
   </div>
      <div id="cuerpoTopx">
         <img id="logoAdmin" src="{{ asset('images/logo2.png') }}">
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

   <script src='{{ url("js/jquery.easy-ticker.js") }}'></script>
   <script src="{{ asset('js/tm-scripts.js') }}"></script>
   <script>
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
      
      });
   </script>
</body>
</html>