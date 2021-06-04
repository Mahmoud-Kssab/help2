<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> @yield('page_title') </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/bootstrap/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons 2.0.0 -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/dist/css/skins/_all-skins.min.css")}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/plugins/iCheck/flat/blue.css")}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/plugins/morris/morris.css")}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/plugins/datepicker/datepicker3.css")}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/plugins/daterangepicker/daterangepicker-bs3.css")}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ URL::asset("adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">

    <link rel="stylesheet" href="{{ URL::asset("adminlte/dist/fonts/fonts-fa.css")}}">
    <link rel="stylesheet" href="{{ URL::asset("adminlte/dist/css/bootstrap-rtl.min.css")}}">
    <link rel="stylesheet" href="{{ URL::asset("adminlte/plugins/datatables/dataTables.bootstrap.css")}}">
    <link rel="stylesheet" href="{{ URL::asset("adminlte/dist/css/skins/_all-skins.min.css")}}">
    <link rel="stylesheet" href="{{ URL::asset("adminlte/dist/css/rtl.css")}}">

    <script src="{{ URL::asset("adminlte/plugins/jQuery/jQuery-2.1.4.min.js")}}"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

    @yield('css')

    <style>
        td,th
        {
            text-align: center
        }

        .dataTables_length, .dt-buttons, #admindatatable-table_filter
        {
            display: inline-block;
            margin-bottom: 50px;
        }
        #admindatatable-table_filter
        {

            margin-right: 10%;

        }

        .dataTables_length
        {
            float: left;
        }
        .fa-angle-left:before
        {
            line-height: 50px
        }
        .skin-blue .sidebar-form
        {
            border-radius: 0;
            border: none
        }
    </style>

  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{route('admin.home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">شغل</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>شغل</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ URL::asset('adminlte/images/shoghl.png') }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ URL::asset('adminlte/images/shoghl.png') }}" class="img-circle" alt="User Image">
                    <p>
                        {{ Auth::user()->name }}
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{route('admin.edit', Auth::user()->id)}}" class="btn btn-default btn-flat">الملف الشخصى</a>
                    </div>
                    <div class="pull-left">
                      <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">تسجيل خروج</a>
                    </div>
                  </li>
                </ul>
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
            <div class="pull-right image">
              <img src="{{ URL::asset('adminlte/images/shoghl.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{Auth::user()->name}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> متاح</a>
            </div>
          </div>
          <!-- search form -->
          {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="بحث ...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> --}}
          <li class="treeview sidebar-form" > <a href="{{route('admin.home')}}"> <h3 style="color: #4b8dba; text-align: center"> <img src="{{ URL::asset('adminlte/images/shoghl.png') }}" class="user-image" alt="User Image" width="25" height="25"> الصفحة الرئيسية </h3> </a> </li>

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">


            <li class="header">المدن والمحافظات</li>
            <li class="{{ active_menu('governorate')[0] }} {{ active_menu('city')[0] }} treeview">
              <a href="#">
                <i class="fa fa-globe"></i> <span>المدن والمحافظات</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu" style="{{ active_menu('governorate')[1] }}">
                  <li class="{{ active_menu('governorate')[0] }}"><a href="{{route('governorate.index')}}"><i class="fa fa-globe"></i>المحافظات</a></li>
                  <li class="{{ active_menu('city')[0] }}"><a href="{{route('city.index')}}"><i class="fa fa-globe"></i> المدن</a></li>
              </ul>
            </li>

            <li class="header"> المشرفين</li>
            <li class="{{ active_menu('admin')[0] }} {{ active_menu('roles')[0] }} treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>المشرفين</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu"  style="{{ active_menu('roles')[1] }} {{ active_menu('admin')[1] }}">
                  <li class="{{ active_menu('admin')[0] }}">><a href="{{route('admin.index')}}"><i class="fa fa-users"></i>المشرفين</a></li>
                  <li class="{{ active_menu('roles')[0] }}">><a href="{{route('roles.index')}}"><i class="fa fa-user"></i>الصلاحيات</a></li>

              </ul>
            </li>


            <li class="header"> الأقسام</li>
            <li class="{{ active_menu('category')[0] }} treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>الأقسام</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu" style="{{ active_menu('category')[1] }}">
                  <li class="{{ active_menu('category')[0] }}" ><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i>الأقسام</a></li>
              </ul>
            </li>


            <li class="header"> المستخدمين</li>
            <li class="{{ active_menu('user')[0] }} treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>المستخدمين</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu" style="{{ active_menu('user')[1] }}">
                  <li class="{{ active_menu('user')[0] }}"><a href="{{route('user.index')}}"><i class="fa fa-user"></i>المستخدمين</a></li>
              </ul>
            </li>


            <li class="header"> الرسائل</li>
            <li class="{{ active_menu('message')[0] }} treeview">
              <a href="#">
                <i class="fa fa-comments"></i> <span>الرسائل</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu" style="{{ active_menu('message')[1] }}">
                  <li class="{{ active_menu('message')[0] }} "><a href="{{route('message.index')}}"><i class="fa fa-comments"></i>الرسائل</a></li>
              </ul>
            </li>


            <li class="header"> الاعلانات</li>
            <li class="{{ active_menu('work')[0] }} treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>الاعلانات</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu" style="{{ active_menu('work')[1] }}">
                  <li class="{{ active_menu('work')[0] }}"><a href="{{route('work.index')}}"><i class="fa fa-circle-o"></i>الاعلانات</a></li>
              </ul>
            </li>


            <li class="header"> الاعدادات</li>
            <li class="{{ active_menu('settings')[0] }} {{ active_menu('contacts')[0] }} treeview">
              <a href="#">
                <i class="fa fa-sliders"></i> <span>الاعدادات</span> <i class="fa fa-angle-left pull-left"></i>
              </a>
              <ul class="treeview-menu" style="{{ active_menu('settings')[1] }} {{ active_menu('contacts')[1] }}">
                  <li class="{{ active_menu('settings')[0] }}"><a href="{{ route('settings.edit', \App\Models\Setting::first()->id ) }}"><i class="fa fa-sliders"></i>الاعدادات</a></li>
                  <li class="{{ active_menu('contacts')[0] }}"><a href="{{route('admin.contacts')}}"><i class="fa fa-phone"></i>أتصل بنا</a></li>
              </ul>
            </li>


            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->




                @yield('content')

      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-left hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
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
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-left">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-left">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-left">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-left">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-left" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-left" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-left" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-left" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-left">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-left"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->


    @stack('dt_js')
    <!-- jQuery UI 1.11.4 -->
    {{-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> --}}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    {{-- <script src="{{ URL::asset("adminlte/plugins/jQuery/jQuery-2.1.4.min.js")}}"></script> --}}

    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    @stack('js')
        <!-- Bootstrap 3.3.4 -->
        <script src="{{ URL::asset("adminlte/bootstrap/js/bootstrap.min.js")}}"></script>
        <!-- Morris.js charts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ URL::asset("adminlte/plugins/morris/morris.min.js")}}"></script>
        <!-- Sparkline -->
        <script src="{{ URL::asset("adminlte/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
        <!-- jvectormap -->
        <script src="{{ URL::asset("adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
        <script src="{{ URL::asset("adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ URL::asset("adminlte/plugins/knob/jquery.knob.js")}}"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="{{ URL::asset("adminlte/plugins/daterangepicker/daterangepicker.js")}}"></script>
        <!-- datepicker -->
        <script src="{{ URL::asset("adminlte/plugins/datepicker/bootstrap-datepicker.js")}}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ URL::asset("adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
        <!-- Slimscroll -->
        <script src="{{ URL::asset("adminlte/plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>
        <!-- FastClick -->
        <script src="{{ URL::asset("adminlte/plugins/fastclick/fastclick.min.js")}}"></script>
        <!-- DataTables -->
        <script src="{{ URL::asset("adminlte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
        <script src="{{ URL::asset("adminlte/plugins/datatables/dataTables.buttons.min.js") }}"></script>
        <script src="{{ URL::asset("adminlte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
        <script src="{{ URL::asset("vendor/datatables/buttons.server-side.js")}}"></script>

        <!-- AdminLTE App -->
        <script src="{{ URL::asset("adminlte/dist/js/app.min.js")}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ URL::asset("adminlte/dist/js/pages/dashboard.js")}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ URL::asset("adminlte/dist/js/demo.js")}}"></script>







    </body>
    </html>
