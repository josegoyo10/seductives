@include('header')
@stack('styles')
<body class="indent">
   <!--header-->
   <header class="indent">
      <em></em>
      <div class="container">
         <h1 class="navbar-brand navbar-brand_">
            <div class="boton-box col-lg-12">
               <a href="{{ route('registro_escort') }}" class="btn btn-danger btn-md" role="button">¿Eres Escort? Click aqui</a>
               <a href="{{ route('login') }}" class="btn btn-danger btn-md" role="button">Acceso</a>
            </div>
            <div class="div_novedades">
               <h2>Novedades</h2>
               <div>
                  <div class="ticker1" style="width:300px;border: 1px solid #CCCCCC;">
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
            <a href="index.html">
               <p  alt="logo" style="width:395px;" style="display:none;">
            </a>
         </h1>
         <div class="head_info wow fadeInLeft" data-wow-delay="0.25s">
            <h2>Encuentra tu Escort Favorita </h2>
            <!-- <form id="buscar" class="form-inline" action="{{ route('buscar_escort') }}" method="POST" accept-charset="utf-8">
               @csrf
               <div class="form-group" style="margin-left:-130px;">
                  <label for="focusedInput">Buscar por Nombre:</label>
                  <input class="form-control" id="search_escort" name="search_escort" type="text" placeholder="Introduzca el Nombre">
                  <a href="#" onClick="document.getElementById('buscar').submit()">
                  <i class="glyphicon glyphicon-search"></i>
                  </a>
               </div>
               </form> -->
         </div>
         <!-- <form id="search" class="search wow fadeInLeft" action="{{ route('buscar_escort') }}" method="POST" accept-charset="utf-8">
            @csrf
            <input type="text" name="search_escort" value="" onfocus="if (this.value == '') {this.value=''}" 
               onblur="if (this.value == '') {this.value=''}" >
            <a href="#" onClick="document.getElementById('search').submit()">
            <img src="{{ asset('img/magnify2.png') }}" alt=""></a> 
            </form> -->
         <div class="clearfix"></div>
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
               <!-- <li class="sub-menu">
                  <a href="{!! route('buscar_todas',['filtro'=>'todas']) !!}">
                     Buscar Todas
                    <form id="search" action="{{ route('buscar_escort') }}" method="POST" accept-charset="utf-8">
                        @csrf
                        <input type="text" name="search_escort" value="" >
                        <a href="#" onClick="document.getElementById('search').submit()">
                         <img src="{{ asset('img/magnify2.png') }}" alt=""></a>
                        </form> 
                  </a>
                  </li> -->
               <li><a href="index-4.html">Foro</a></li>
               </form>
            </ul>
            <div style="position:absolute; margin-left:860px;top:15px;">
               <form id="buscar" class="form-inline" action="{{ route('buscar_escort') }}" method="POST" accept-charset="utf-8">
               @csrf
               <div class="form-group" style="margin-left:-130px;">
                  <label for="focusedInput"></label>
                  <input class="form-control" id="search_escort" name="search_escort" type="text" placeholder="Introduzca el Nombre">
                  <a href="#" onClick="document.getElementById('buscar').submit()">
                  <i class="glyphicon glyphicon-search"></i>
                  </a>
               </div>
            </div>
         </nav>
      </div>
   </header>
   <div class="global">
      <!-- MAIN CONTENT -->
      @yield('content')
      <!--content-->  
      <!--footer-->
      @include('footer')
      <!--JS-->
      @include('scripts')
      @stack('scripts')
   </div>
   <script src='{{ url("js/jquery.easy-ticker.js") }}'></script>
   <script>
      $( document ).ready(function() {
      
      //    $.ajax({
      //           data:  {
      //             "vista" : 'geolocalizacion'
      //           }, 
      //            url:   '/',
      //           type:  'GET',
      //           success:  function (data) {
      //             alert("GEO2xxx");
      //             //$('#resultado').html(data);
      //             //location.reload();
      //                console.log(data);
      //           }
      //   });
      
         
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