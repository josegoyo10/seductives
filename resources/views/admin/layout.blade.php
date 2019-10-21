<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Seductives | Administración</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href='{{ url("adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css") }}'>
      <!-- Font Awesome -->
      <link rel="stylesheet" href='{{ url("adminlte/bower_components/font-awesome/css/font-awesome.min.css") }}'>
      <!-- Ionicons -->
      <link rel="stylesheet" href='{{ url("adminlte/bower_components/Ionicons/css/ionicons.min.css") }}'>
      <!-- Theme style -->
      <link rel="stylesheet" href='{{ url("adminlte/css/AdminLTE.min.css") }}'>
      <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href='{{ url("adminlte/css/skins/skin-blue.min.css") }}'>
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      <!-- DataTables -->
      <link rel="stylesheet" href='{{ url("adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") }}'>
     
           @yield('css')
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <header class="main-header" style="max-height:30px;">
            <!-- Logo -->
            <a href="{{ url('admin') }}" class="logo" style="background-color:#000000">
               <!-- mini logo for sidebar mini 50x50 pixels -->
               <span class="logo-mini"><b>Seductives</b></span>
               <!-- logo for regular state and mobile devices -->
               <span class="logo-lg">
                  <img src="{{ url('images/img/sedchico.png') }}"  alt="">
               </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" style="background-color:#000000">
               <!-- Sidebar toggle button-->
               <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
               <span class="sr-only">Toggle navigation</span>
               </a>
               <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- Messages: style can be found in dropdown.less-->
                     <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li class="header">You have 4 messages</li>
                           <li>
                              <!-- inner menu: contains the actual data -->
                              <ul class="menu">
                                 <li>
                                    <!-- start message -->
                                    <a href="#">
                                       <div class="pull-left">
                                          <img src='{{ url("adminlte/img/user2-160x160.jpg") }}' class="img-circle" alt="User Image">
                                       </div>
                                       <h4>
                                          Support Team
                                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                       </h4>
                                       <p>Why not buy a new awesome theme?</p>
                                    </a>
                                 </li>
                                 <!-- end message -->
                                 <li>
                                    <a href="#">
                                       <div class="pull-left">
                                          <img src='{{ url("adminlte/img/user3-128x128.jpg") }}' class="img-circle" alt="User Image">
                                       </div>
                                       <h4>
                                          AdminLTE Design Team
                                          <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                       </h4>
                                       <p>Why not buy a new awesome theme?</p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <div class="pull-left">
                                          <img src='{{ url("adminlte/img/user4-128x128.jpg") }}' class="img-circle" alt="User Image">
                                       </div>
                                       <h4>
                                          Developers
                                          <small><i class="fa fa-clock-o"></i> Today</small>
                                       </h4>
                                       <p>Why not buy a new awesome theme?</p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <div class="pull-left">
                                          <img src='{{ url("adminlte/img/user3-128x128.jpg") }}' class="img-circle" alt="User Image">
                                       </div>
                                       <h4>
                                          Sales Department
                                          <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                       </h4>
                                       <p>Why not buy a new awesome theme?</p>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <div class="pull-left">
                                          <img src= '{{ url("adminlte/img/user4-128x128.jpg") }}' class="img-circle" alt="User Image">
                                       </div>
                                       <h4>
                                          Reviewers
                                          <small><i class="fa fa-clock-o"></i> 2 days</small>
                                       </h4>
                                       <p>Why not buy a new awesome theme?</p>
                                    </a>
                                 </li>
                              </ul>
                           </li>
                           <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                     </li>
                     <!-- Notifications: style can be found in dropdown.less -->
                     <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li class="header">You have 10 notifications</li>
                           <li>
                              <!-- inner menu: contains the actual data -->
                              <ul class="menu">
                                 <li>
                                    <a href="#">
                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                    page and may cause design problems
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                    <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                 </li>
                            
                              </ul>
                           </li>
                           <li class="footer"><a href="#">View all</a></li>
                        </ul>
                     </li>
                     <!-- Tasks: style can be found in dropdown.less -->
                     <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                           <li class="header">You have 9 tasks</li>
                           <li>
                              <!-- inner menu: contains the actual data -->
                              <ul class="menu">
                                 <li>
                                    <!-- Task item -->
                                    <a href="#">
                                       <h3>
                                          Design some buttons
                                          <small class="pull-right">20%</small>
                                       </h3>
                                       <div class="progress xs">
                                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                             <span class="sr-only">20% Complete</span>
                                          </div>
                                       </div>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#">
                                       <h3>
                                          Create a nice theme
                                          <small class="pull-right">40%</small>
                                       </h3>
                                       <div class="progress xs">
                                          <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                             <span class="sr-only">40% Complete</span>
                                          </div>
                                       </div>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#">
                                       <h3>
                                          Some task I need to do
                                          <small class="pull-right">60%</small>
                                       </h3>
                                       <div class="progress xs">
                                          <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                             <span class="sr-only">60% Complete</span>
                                          </div>
                                       </div>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                                 <li>
                                    <!-- Task item -->
                                    <a href="#">
                                       <h3>
                                          Make beautiful transitions
                                          <small class="pull-right">80%</small>
                                       </h3>
                                       <div class="progress xs">
                                          <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                             <span class="sr-only">80% Complete</span>
                                          </div>
                                       </div>
                                    </a>
                                 </li>
                                 <!-- end task item -->
                              </ul>
                           </li>
                           <li class="footer">
                              <a href="#">View all tasks</a>
                           </li>
                        </ul>
                     </li>
                     <!-- User Account: style can be found in dropdown.less -->
                     <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="#btn-id" role="button" aria-haspopup="true" aria-expanded="false">
                        @if($data->foto_principal != '')
                        <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}" class="user-image"  alt="User Image">
                        @else
                        <img src= '{{ url("adminlte/img/user2-160x160.jpg") }}' class="user-image"  alt="User Image">
                        @endif 
                        <span class="hidden-xs"> {{ ucfirst(auth()->user()->name) }}</span>
                        </a> 
                        <ul class="dropdown-menu">
                           <!-- User image --> 
                           <li class="user-header" style="background-color:#000000">
                              @if($data->foto_principal != '')
                              <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}" class="img-circle" alt="User Image">
                              @else
                              <img src= '{{ url("adminlte/img/user2-160x160.jpg") }}' class="img-circle" alt="User Image">
                              @endif  
                              <p>
                                 {{ ucfirst(auth()->user()->name) }}
                                 <small></small>
                              </p>
                           </li>
                           <!-- Menu Body -->
                           <li class="user-body">
                              <!-- <div class="row">
                                 <div class="col-xs-4 text-center">
                                   <a href="#">Followers</a>
                                 </div>
                                 <div class="col-xs-4 text-center">
                                   <a href="#">Sales</a>
                                 </div>
                                 <div class="col-xs-4 text-center">
                                   <a href="#">Friends</a>
                                 </div>
                                 </div> -->
                              <!-- /.row -->
                           </li>
                           <!-- Menu Footer-->
                           <li class="user-footer">
                              <div class="pull-left">
                                 <a href="#" class="btn btn-default btn-flat" >Perfil</a>
                              </div>
                              <div class="pull-right">
                                 <a  href="{{ route('logout') }}" 
                                    class="btn btn-default btn-flat"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit(); ">Salir
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                 </form>
                              </div>
                           </li>
                        </ul>
                     </li>
                     <!-- Control Sidebar Toggle Button -->
                     <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
         <!-- Left side column. contains the logo and sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
               <!-- Sidebar user panel -->
               <div class="user-panel">
                  <div class="pull-left image">
                     @if($data->foto_principal != '')
                     <img src="{{ url('uploads/escort_fotos/'.$data->foto_principal) }}" class="img-circle" alt="User Image">
                     @else  
                     <img src='{{ url("adminlte/img/user2-160x160.jpg") }}' class="img-circle" alt="User Image">
                     @endif 
                  </div>
                  <div class="pull-left info">
                     <p>{{ auth()->user()->name }}</p>
                     <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
                  </div>
               </div>
               <!-- SIDEBAR MENU-->
               @include('admin.partials.nav')
            </section>
            <!-- /.sidebar -->
         </aside>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               @yield('header')
            </section>
            <!-- Main content -->
            <section class="content">
               @if (session()->has('flash'))
               <div class="alert alert-success">{{ session('flash') }}</div>
               @endif
               @yield('content')
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <footer class="main-footer">
            <div class="pull-right hidden-xs">
               <b>Version</b> 1.0
            </div>
            <strong>Derechos Reservados &copy; 2019 - Seductives.</strong>
         </footer>
         <!-- Control Sidebar -->
         <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
               <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
               <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
               <!-- Home tab content -->
               <div class="tab-pane" id="control-sidebar-home-tab">
                  <h3 class="control-sidebar-heading">Recent Activity</h3>
                  <ul class="control-sidebar-menu">
                     <li>
                        <a href="javascript:void(0)">
                           <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                           <div class="menu-info">
                              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                              <p>Will be 23 on April 24th</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                           <i class="menu-icon fa fa-user bg-yellow"></i>
                           <div class="menu-info">
                              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                              <p>New phone +1(800)555-1234</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                           <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                           <div class="menu-info">
                              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                              <p>nora@example.com</p>
                           </div>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                           <i class="menu-icon fa fa-file-code-o bg-green"></i>
                           <div class="menu-info">
                              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                              <p>Execution time 5 seconds</p>
                           </div>
                        </a>
                     </li>
                  </ul>
                  <!-- /.control-sidebar-menu -->
                  <h3 class="control-sidebar-heading">Tasks Progress</h3>
                  <ul class="control-sidebar-menu">
                     <li>
                        <a href="javascript:void(0)">
                           <h4 class="control-sidebar-subheading">
                              Custom Template Design
                              <span class="label label-danger pull-right">70%</span>
                           </h4>
                           <div class="progress progress-xxs">
                              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                           </div>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                           <h4 class="control-sidebar-subheading">
                              Update Resume
                              <span class="label label-success pull-right">95%</span>
                           </h4>
                           <div class="progress progress-xxs">
                              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                           </div>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                           <h4 class="control-sidebar-subheading">
                              Laravel Integration
                              <span class="label label-warning pull-right">50%</span>
                           </h4>
                           <div class="progress progress-xxs">
                              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                           </div>
                        </a>
                     </li>
                     <li>
                        <a href="javascript:void(0)">
                           <h4 class="control-sidebar-subheading">
                              Back End Framework
                              <span class="label label-primary pull-right">68%</span>
                           </h4>
                           <div class="progress progress-xxs">
                              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                           </div>
                        </a>
                     </li>
                  </ul>
                  <!-- /.control-sidebar-menu -->
               </div>
               <!-- /.tab-pane -->
               <!-- Stats tab content -->
               <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
               <!-- /.tab-pane -->
               <!-- Settings tab content -->
               <div class="tab-pane" id="control-sidebar-settings-tab">
                  <form method="post">
                     <h3 class="control-sidebar-heading">General Settings</h3>
                     <div class="form-group">
                        <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                           Some information about this general settings option
                        </p>
                     </div>
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                           Other sets of options are available
                        </p>
                     </div>
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                           Allow the user to show his name in blog posts
                        </p>
                     </div>
                     <!-- /.form-group -->
                     <h3 class="control-sidebar-heading">Chat Settings</h3>
                     <div class="form-group">
                        <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                        </label>
                     </div>
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                        </label>
                     </div>
                     <!-- /.form-group -->
                     <div class="form-group">
                        <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                     </div>
                     <!-- /.form-group -->
                  </form>
               </div>
               <!-- /.tab-pane -->
            </div>
         </aside>
         <!-- /.control-sidebar -->
         <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
         <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->
      <!-- jQuery 3 -->
      <script src='{{ url("adminlte/bower_components/jquery/dist/jquery.min.js") }}'></script>
      
      <!-- Bootstrap 3.3.7 -->
      <script src='{{ url("adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js") }}'></script>
      <!-- AdminLTE App -->
      <script src='{{ url("adminlte/js/adminlte.min.js") }}'></script>
      <!-- DataTables -->
      <script src='{{ url("adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js") }}'></script>
      <script src='{{ url("adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") }}'></script>
      <!--boostrap lightbox !-->
      <script src='{{url("js/ekko-lightbox.js") }}'></script>
      @yield('scripts')
      <script>
         $(function () {
               $('#cliente-table').DataTable({
                 'paging'      : true,
                 'lengthChange': false,
                 'searching'   : true,
                 'ordering'    : true,
                 'info'        : true,
                 'autoWidth'   : false,
                 "language": {
                     "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                  }
               })
         })
          
         $(document).ready(function(){
             
                $(document).on('click', '.dropdown-menu-button', function (e) {
                      e.stopPropagation()
               });
        
         
         
               $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                        event.preventDefault();
                        $(this).ekkoLightbox();
                     });
         });
         
            //subir foto del Perfil escort.
         
           //  $('input[type=file]').on('change', function() { 
           //        // select the form and submit
           //        alert("A file has been selected.");
           //   });
         
         
         
      </script>
   </body>
</html>