@extends('layouts.master_templates')

@section('title','Admin - RentOnCome')

@section('logo-header')
	<!-- Logo -->
    <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>R</b>OC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>ROC</span>
    </a>
@endsection

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page Header
            <small>Optional description</small>
        </h1>
    </section>
@endsection

@section('navbar-right')
	<!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">Admin RentOnCome</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    Admin RentOnCome
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
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
@endsection

@section('sidebar-left')
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">

	    <!-- sidebar: style can be found in sidebar.less -->
	    <section class="sidebar">

	    <!-- Sidebar user panel (optional) -->
	        <div class="user-panel">
	            <div class="pull-left image">
	                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	            </div>
	            <div class="pull-left info">
	                <p>Admin</p>
	            </div>
	        </div>

	        <!-- Sidebar Menu -->
	        <ul class="sidebar-menu" data-widget="tree">
	            <!-- Optionally, you can add icons to the links -->
	            <li class="active">
	                <a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a>
	            </li>
	            <li>
	                <a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a>
	            </li>
	            <li class="treeview">
	                <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
	                    <span class="pull-right-container">
	                    <i class="fa fa-angle-left pull-right"></i>
	                    </span>
	                </a>
	                <ul class="treeview-menu">
	                    <li>
	                        <a href="#">Link in level 2</a>
	                    </li>
	                    <li>
	                        <a href="#">Link in level 2</a>
	                    </li>
	                </ul>
	            </li>
	        </ul>
	    	<!-- /.sidebar-menu -->
	    </section>
		<!-- /.sidebar -->
	</aside>
@endsection

@section('content')

@endsection