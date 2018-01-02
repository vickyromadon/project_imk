<!DOCTYPE html>
<html>
<head>
    @include('layouts.master_partials.head')
    @yield('css')
    <title>Seller - RentOnCome</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="/seller" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>R</b>OC</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Seller</b>ROC</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{ asset('images/store/'.$user->store->picture) }}" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ $user->first_name }} {{ $user->last_name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{ asset('images/store/'.$user->store->picture) }}" class="img-circle" alt="User Image">
                                <p>
                                    {{ $user->first_name }} {{ $user->last_name }}
                                    <small>Seller Since : {{ $user->created_at }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                             <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/profile_store/{{ $user->store->id }}" class="btn btn-default btn-flat">Manage Profile</a>
                                </div>
                                <div class="pull-right">
                                <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
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

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('images/store/'.$user->store->picture) }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <!-- Optionally, you can add icons to the links -->
                <li>
                    <a href="/"><i class="fa fa-home"></i> <span>Home</span></a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-cubes"></i> <span>Products</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/seller/add_produk"><i class="fa fa-pencil-square-o"></i>Add Produks</a>
                        </li>
                        <li>
                            <a href="/seller/list_produk"><i class="fa fa-list"></i>List Products</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/seller/history/{{ $user->id }}"><i class="fa fa-folder-open"></i> <span>History</span></a>
                </li>
                
            </ul>
          <!-- /.sidebar-menu -->
        </section>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Bagian Alert Info -->
        @include('layouts.partials.info')
        
        <!-- Content Header (Page header) -->
        @yield('content_header')

        <!-- Main content -->
        <section class="content container-fluid">

            @yield('content')

        </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            E-mail : vickyromadon46@gmail.com
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2017 <a href="#">Vicky Romadon</a>.</strong> All rights reserved.
    </footer>
</div>
    <!-- jQuery 3 -->
    <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- Token -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    @yield('javascript')
</body>
</html>