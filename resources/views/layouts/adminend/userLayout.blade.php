<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />

        <title>User | Dashboard</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css" />
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
        <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/adminlte.min.css" />
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Left side -->
            @include('layouts.adminend.leftSide')
            <!-- Left side -->
            
            <!-- Center content --> 
            @yield('content')
            <!-- Center content -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.0.5</div>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/dist/js/adminlte.js"></script>

        <!-- OPTIONAL SCRIPTS -->
        <script src="/dist/js/demo.js"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
        <script src="/plugins/raphael/raphael.min.js"></script>
        <script src="/plugins/jquery-mapael/jquery.mapael.min.js"></script>
        <script src="/plugins/jquery-mapael/maps/usa_states.min.js"></script>
        <!-- ChartJS -->
        <script src="/plugins/chart.js/Chart.min.js"></script>

        <!-- PAGE SCRIPTS -->
        <script src="/dist/js/pages/dashboard2.js"></script>
        
        @yield('pageScripts')
    </body>
</html>
