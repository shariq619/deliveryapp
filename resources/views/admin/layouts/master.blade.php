<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin | Shop</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

    <!-- Select 2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">

    <link rel="stylesheet" href="/css/app.css/">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="{{asset('admin/img/AdminLTELogo.png')}}" alt="Shop Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Admin | Shop</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{auth()->guard('admin')->user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{route('admin.home')}}"
                           class="nav-link {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>


                    @role('super-admin')
                    <li class="nav-item">
                        <a href="{{route('permissions.index')}}"
                           class="nav-link {{ (request()->is('admin/permissions*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Permissions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('roles.index')}}"
                           class="nav-link {{ (request()->is('admin/roles*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                    @endrole

                    @role('super-admin|admin')
                    <li class="nav-item">
                        <a href="{{route('users.index')}}"
                           class="nav-link {{ (request()->is('admin/users*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Users</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('categories.index')}}"
                           class="nav-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Categories</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('products.index')}}"
                           class="nav-link {{ (request()->is('admin/products*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('orders.index')}}"
                           class="nav-link {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Orders</p>
                        </a>
                    </li>

                    @endrole


                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                {{ __('Logout') }}
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        {{--<ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>--}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Shop
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{date('Y')}}.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<script src="/js/app.js"></script>

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.')}}js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.')}}js"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.')}}js"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Select 2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

@stack('scripts')


</body>
</html>
