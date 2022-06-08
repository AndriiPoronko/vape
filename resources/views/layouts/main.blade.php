<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vape Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}} ">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}} ">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">


            <!-- Messages Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{route('order.index')}}">
                    <i class="fas fa-shopping-bag"></i>
                    <span class="badge badge-danger navbar-badge">{{$countOrders}}</span>
                </a>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">{{$countCalls + $countMessages}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{$countCalls + $countMessages}} Уведомления</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('message.index')}}" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> {{$countMessages}} новых сообщений
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('call.index')}}" class="dropdown-item">
                        <i class="fas fa-phone-alt mr-2"></i> {{$countCalls}} новых звонков
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link d-flex justify-content-center">
            <span class="brand-text font-weight-light"><b>VAPE STEAM</b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Товары
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('order.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>
                                Заказы
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Пользователи
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-stream"></i>
                            <p>
                                Категории
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('tag.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-hashtag"></i>
                            <p>
                                Вкусы
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('color.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-palette"></i>
                            <p>
                                Цвета
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('message.index')}}" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Уведомления
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('call.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-phone-alt"></i>
                            <p>
                                Перезвонить
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->


</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src=" {{asset('admin/plugins/jquery/jquery.min.js')}} "></script>
<!-- Bootstrap -->
<script src=" {{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!-- overlayScrollbars -->
<script src=" {{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}} "></script>
<!-- AdminLTE App -->
<script src=" {{asset('admin/dist/js/adminlte.js')}} "></script>
<!-- bs-custom-file-input -->
<script src="{{asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });
    $('.select2').select2();
</script>

</body>
</html>
