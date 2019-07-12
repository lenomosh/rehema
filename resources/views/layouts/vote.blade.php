<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REHEMA SCHOOL</title>
    {{--Data tables--}}
    <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet"
          href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('admin')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>RS</b>PES</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Rehema</b>School</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                            {{--<span class="hidden-xs">{{ Auth::user()->name }}</span>--}}
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                                <p>
                                    Lennox Omondi - Web Developer
                                    <small>Member since Nov. 2015</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat" disabled hidden>Profile</a>
                                </div>

                                <div class="pull-right">
                                    <form method="post" action="{{route('logout')}}">
                                        @csrf
                                        <input type="submit" class="btn btn-default btn-flat" value="Sign out">
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <!-- search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active">
                    <a href="{{route('admin')}}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>{{--

                    <a href="{{route('teachers.index')}}"><i class="fa fa-graduation-cap"></i><span>Teachers</span></a>
                    <a href="{{route('students.index')}}"><i class="fa fa-users"></i><span>Students</span></a>
                    <a href="{{route('classes.index')}}"><i class="fa fa-institution"></i><span>Classes</span></a>
                    <a href="/admin/contestants"><i class="fa fa-user-circle"></i><span>Contestants</span></a>
                    <a href="/admin/elections"><i class="fa fa-cube"></i><span>Elections</span></a>--}}
                </li>
                {{--Teachers--}}
                <li class="treeview">
                    <a href="{{route('teachers.index')}}">
                        <i class="fa fa-graduation-cap"></i> <span>Teachers</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('teachers.create')}}"><i class="fa fa-circle-o"></i>New Teacher</a></li>
                        <li><a href="{{route('teachers.index')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    </ul>
                </li>
                {{----}}
                {{--Students--}}
                <li class="treeview">
                    <a href="{{route('teachers.index')}}">
                        <i class="fa fa-child"></i> <span>Students</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('students.index')}}"><i class="fa fa-circle-o"></i>New Student</a></li>
                        <li><a href="{{route('students.index')}}"><i class="fa fa-circle-o"></i> All Students</a></li>
                    </ul>
                </li>
                {{--end students--}}
                {{--classes--}}
                <li class="treeview">
                    <a href="{{route('classes.index')}}">
                        <i class="fa fa-institution"></i> <span>Classes</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('classes.index')}}"><i class="fa fa-circle-o text-red"></i>
                                <span>Add</span></a></li>
                        <li><a href="{{route('classes.index')}}"><i class="fa fa-circle-o text-yellow"></i>
                                <span>View</span></a></li>
                    </ul>
                </li>
                {{--end classes--}}

                {{--Contestants--}}
                <li class="treeview">
                    <a href="{{route('contestants.index')}}">
                        <i class="fa fa-users"></i> <span>Contestants</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('contestants.index')}}"><i class="fa fa-circle-o text-white"></i> <span>Pending</span></a>
                        </li>
                        <li><a href="{{route('register.index')}}" target="_blank"><i
                                        class="fa fa-circle-o text-yellow"></i> <span>Add</span></a></li>
                        <li><a href="{{route('contestants.disqualified')}}"><i class="fa fa-circle-o text-red"></i>
                                <span>Rejected</span></a></li>
                        <li><a href="{{route('contestants.approved')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Approved</span></a>
                        </li>
                    </ul>
                </li>
                {{--end contestants--}}

                {{--Reports--}}
                <li class="treeview">
                    <a href="{{route('teachers.index')}}">
                        <i class="fa fa-book"></i> <span>Reports</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('reports.index')}}"><i class="fa fa-circle-o text-yellow"></i> <span>Voters List</span></a>
                        </li>
                        <li><a href="{{route('reports.candidate_for_each_post')}}"><i
                                        class="fa fa-circle-o text-yellow"></i>
                                <span>Contestants for each post</span></a></li>
                        <li><a href="{{route('reports.class_teachers')}}"><i class="fa fa-circle-o text-yellow"></i>
                                <span>Class Teachers</span></a></li>
                        <li><a href="{{route('reports.winners')}}"><i class="fa fa-circle-o text-yellow"></i> <span>Winners</span></a>
                        </li>
                        <li><a href="{{route('reports.spoilt_votes')}}"><i class="fa fa-circle-o text-yellow"></i>
                                <span>Spoilt Votes</span></a></li>
                        <li><a href="{{route('reports.contestants.vote.ganered')}}"><i
                                        class="fa fa-circle-o text-yellow"></i> <span>Votes Garnered</span></a></li>
                    </ul>
                </li>
                {{--end reports--}}
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('breadcrump')
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2019 <a href="https://linkedin.com/lenomosh">Lennox Omondi</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
{{--data tables links for advanced tables--}}
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('bower_components/PACE/pace.min.js')}}"></script>

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
</body>
</html>
