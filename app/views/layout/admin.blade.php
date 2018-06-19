<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ Config::get('bidoboo.name') }} Backend System</title>
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico">
    <!-- Bootstrap -->
    {{ HTML::style('/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- Font Awesome -->
    {{ HTML::style('/assets/vendors/font-awesome/css/font-awesome.min.css') }}
    <!-- NProgress -->
    {{ HTML::style('/assets/vendors/nprogress/nprogress.css') }}
    <!-- iCheck -->
    {{ HTML::style('/assets/vendors/iCheck/skins/flat/green.css') }}
    <!-- bootstrap-daterangepicker -->
    {{ HTML::style('/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}
    <!-- Bootstrap File Upload Plugin -->
    {{ HTML::style('/assets/css/admin/bs-filestyle.css') }}
    <!-- Datatables -->
    {{ HTML::style('/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
    {{ HTML::style('/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}
    {{ HTML::style('/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}
    {{ HTML::style('/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}
    {{ HTML::style('/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}

    <!-- Custom Theme Style -->
    {{ HTML::style('/assets/css/admin/admin.css') }}
    {{ HTML::style('/assets/css/admin/custom.min.css') }}
    
    <!-- jQuery -->
    {{ HTML::script('/assets/vendors/jquery/dist/jquery.min.js') }}
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="/assets/images/bidoboo_logo(red).png" alt="{{ Config::get('bidoboo.name') }}" width="120"> </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @if (Auth::check())
                <div class="profile">
                  <div class="profile_info" style="width:100%">
                    <span>Welcome,</span>
                    <h2><?php echo Auth::user()->name;?></h2>
                  </div>
                </div>
            @endif
            <!-- /menu profile quick info -->

            <br />
            
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>&nbsp;</h3>
                <hr style="border-top:solid 1px #213138">
                <ul class="nav side-menu">
                  <li><a href="{{route('dashboard.list')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                  <li><a href="{{route('banner.list')}}"><i class="fa fa-picture-o"></i> Banner</a></li>
                  <li><a href="{{route('user.list')}}"><i class="fa fa-users"></i> Users</a></li>
                  <li><a href="{{route('product.list')}}"><i class="fa fa-dollar"></i> Products</a></li>
                  <?php /*?><li><a href="{{route('project.list')}}"><i class="fa fa-clipboard"></i> Projects</a></li>
                  <li><a href="{{route('package.list')}}"><i class="fa fa-dollar"></i> Package</a></li><?php */?>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo Auth::user()->name;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                  	<li><a href="{{route('admin.settings')}}">Setting</a></li>
                    <li><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
			{{$body}}
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; 2017 {{ Config::get('bidoboo.name') }}. All Rights Reserved.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    <!-- Bootstrap -->
    {{ HTML::script('/assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}
    <!-- FastClick -->
    {{ HTML::script('/assets/vendors/fastclick/lib/fastclick.js') }}
    <!-- NProgress -->
    {{ HTML::script('/assets/vendors/nprogress/nprogress.js') }}
    <!-- iCheck -->
    {{ HTML::script('/assets/vendors/iCheck/icheck.min.js') }}
    <!-- DateJS -->
    {{ HTML::script('/assets/vendors/DateJS/build/date.js') }}
    <!-- bootstrap-daterangepicker -->
    {{ HTML::script('/assets/vendors/moment/min/moment.min.js') }}
    {{ HTML::script('/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}
   	<!-- Bootstrap File Upload Plugin -->
    {{ HTML::script('/assets/js/admin/bs-filestyle.js') }}
    <!-- Datatables -->
    {{ HTML::script('/assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}
    {{ HTML::script('/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}
    {{ HTML::script('/assets/vendors/jszip/dist/jszip.min.js') }}
    {{ HTML::script('/assets/vendors/pdfmake/build/pdfmake.min.js') }}
    {{ HTML::script('/assets/vendors/pdfmake/build/vfs_fonts.js') }}

    <!-- Custom Theme Scripts -->
    {{ HTML::script('/assets/js/admin/custom.min.js') }}
    <!-- Daterange Format -->
    {{ HTML::script('/assets/js/daterangepicker.js') }}    
    
    @if( isset($scripts['inline']) )
      @foreach ($scripts['inline'] as $script)
        {{ HTML::script($script) }}
      @endforeach
    @endif

    @if( isset($styles['inline']) )
      @foreach ($styles['inline'] as $style)
        {{ HTML::style($style) }}
      @endforeach
    @endif

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
		$('#datatable').DataTable();
        
      });
    </script>
    <!-- /Datatables -->
  </body>
</html>
