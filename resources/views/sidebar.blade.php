<div class="col-md-2 left-feild">
   <div class="be-vidget">
      <h3 class="letf-menu-article">Novedades</h3>
     
      <div class="creative_filds_block">
         <div class="ticker1">
            <div class="innerWrap be-user-statistic">
                   @foreach($noticias as $news)
                    
                    @if (\Carbon\Carbon::parse($news->created_at)->format('Y-m-d') == $today)
                  
                           <div class="demo" >
                              <img src="{{ $news->foto_principal}}" class="img-circle" 
                              style="float: left; margin: 0px 5px 25px 0px;width:35px;">
                              <p class="parrafo"><strong>{{ ($news->descripcion)}}</strong>
                              
                              </p>
                           </div>
                       @endif
                   @endforeach 
             
            </div>
         </div>
      </div>
   </div>
   <div class="be-vidget">
      <h3 class="letf-menu-article">
         Filter By
      </h3>
      <div class="filter-block">
         <ul>
            <li>
               <a><i class="fa fa-graduation-cap"></i>Schools</a>
               <div class="be-popup">
                  <h3 class="letf-menu-article">
                     Enter School
                  </h3>
                  <form action="./" class="input-search">
                     <input class="filters-input" type="text" required placeholder="Start typing to see list">
                  </form>
                  <i class="fa fa-times"></i>
               </div>
            </li>
            <li>
               <a><i class="fa fa-wrench"></i>Tools Used</a>
               <div class="be-popup">
                  <h3 class="letf-menu-article">
                     Tools
                  </h3>
                  <form action="./" class="input-search">
                     <input class="filters-input" type="text" required placeholder="Start typing to see list">
                  </form>
                  <i class="fa fa-times"></i>
               </div>
            </li>
            <li>
               <a><i class="fa fa-paint-brush"></i>Color</a>
               <div class="be-popup be-color-picker">
                  <h3 class="letf-menu-article">
                     Choose color
                  </h3>
                  <div class="for-colors">
                     <ul class="colors  cfix">
                        <li data-filter=".category-1" class="color filter color-0-0"></li>
                        <li data-filter=".category-2" class="color filter color-0-1"></li>
                        <li data-filter=".category-3" class="color filter color-0-2"></li>
                        <li data-filter=".category-4" class="color filter color-0-3"></li>
                        <li data-filter=".category-5" class="color filter color-0-4"></li>
                        <li data-filter=".category-1" class="color filter color-0-5"></li>
                        <li data-filter=".category-2" class="color filter color-0-6"></li>
                        <li data-filter=".category-3" class="color filter color-0-7"></li>
                        <li data-filter=".category-4" class="color filter color-0-8"></li>
                        <li data-filter=".category-5" class="color filter color-0-9"></li>
                     </ul>
                  </div>
                  <i class="fa fa-times"></i>
               </div>
            </li>
            <li>
               <a><i class="fa fa-camera-retro"></i>Visit Gallery</a>
               <div class="be-popup">
                  <h3 class="letf-menu-article">
                     Galerry
                  </h3>
                  <form action="./" class="input-search">
                     <input  class="filters-input" type="text" required placeholder="Start typing to see list">
                  </form>
                  <i class="fa fa-times"></i>
               </div>
            </li>
         </ul>
      </div>
   </div>
</div>
@push('scripts')
<!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<script src='{{ url("js/jquery.easy-ticker.js") }}'></script> 
@endpush('scripts')
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