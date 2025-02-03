<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Magang</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('images/logo.png') }}" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <marquee>Selamat Datang di Sistem Kami, silahkan anda explore tempat magang anda</marquee>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (Auth()->user()->foto_profile)
                            <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                class="user-image img-circle" alt="User Image">
                        @else
                            <img src="{{ asset('images/foto-profile.png') }}" class="user-image img-circle"
                                alt="User Image">
                        @endif
                        <span class="d-none d-md-inline">{{ Auth()->user()->name ?? '-' }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            @if (Auth()->user()->foto_profile)
                                <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                    class="img-circle elevation-2" alt="User Image">
                            @else
                                <img src="{{ asset('images/foto-profile.png') }}" class="img-circle elevation-2"
                                    alt="User Image">
                            @endif

                            <p>
                                {{ Auth()->user()->name ?? '-' }}
                                <small>{{ Auth()->user()->level ?? '-' }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ route('setting.index') }}" class="btn btn-default btn-flat">Profile</a>
                            <a href="{{ route('login.logout') }}"
                                class="btn btn-default btn-flat float-right">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link">
                <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-bold text-white">Magang</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        @if (Auth()->user()->foto_profile)
                            <img src="{{ asset('storage/' . Auth()->user()->foto_profile) }}"
                                class="img-circle elevation-2" alt="User Image">
                        @else
                            <img src="{{ asset('images/foto-profile.png') }}" class="img-circle elevation-2"
                                alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth()->user()->name ?? '-' }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item" data-name="dashboard">
                            <a href="/dashboard" class="nav-link @yield('menuDashboard')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        @if (Auth()->user()->level == 'Admin')
                            <li class="nav-item" data-name="perizinan">
                                <a href="{{ route('data-perizinan.index') }}" class="nav-link @yield('menuDataPerizinan')">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Data Perizinan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item" data-name="laporanmingguan">
                                <a href="{{ route('data-laporanmingguan.index') }}"
                                    class="nav-link @yield('menuDataLaporanMingguan')">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>
                                        Laporan Mingguan
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item" data-name="laporanmagang">
                                <a href="{{ route('data-laporanmagang.index') }}" class="nav-link @yield('menuDataLaporanMagang')">
                                    <i class="nav-icon fas fa-comments"></i>
                                    <p>
                                        Laporan Magang
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item" data-name="userregistrasi">
                                <a href="{{ route('data-user.index') }}" class="nav-link @yield('menuDataUser')">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Users Registrasi
                                    </p>
                                </a>
                            </li>
                        @elseif (Auth()->user()->level == 'Mahasiswa')
                            <li class="nav-item" data-name="perizinan">
                                <a href="{{ route('mahasiswa-perizinan.index') }}"
                                    class="nav-link @yield('menuDataPerizinan')">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Data Perizinan
                                    </p>
                                </a>
                            </li>
                            @php
                                $izins = \App\Models\Perizinan::where('users_id', Auth()->user()->id)->first();
                            @endphp
                            @if (!empty($izins))
                                @if ($izins->status == 'Diterima')
                                    <li class="nav-item" data-name="laporanmingguan">
                                        <a href="{{ route('mahasiswa-laporanmingguan.index') }}"
                                            class="nav-link @yield('menuDataLaporanMingguan')">
                                            <i class="nav-icon fas fa-calendar-alt"></i>
                                            <p>
                                                Laporan Mingguan
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-name="laporanmagang">
                                        <a href="{{ route('mahasiswa-laporanmagang.index') }}"
                                            class="nav-link @yield('menuDataLaporanMagang')">
                                            <i class="nav-icon fas fa-comments"></i>
                                            <p>
                                                Laporan Magang
                                            </p>
                                        </a>
                                    </li>
                                @endif
                            @endif
                        @elseif (Auth()->user()->level == 'Operator')
                            <li class="nav-item" data-name="perizinan">
                                <a href="{{ route('operator-perizinan.index') }}" class="nav-link @yield('menuDataPerizinan')">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Data Perizinan
                                        @php
                                            $izinStatusCount = \App\Models\Perizinan::where(
                                                'status',
                                                'Proses',
                                            )->count();
                                        @endphp
                                        @if ($izinStatusCount)
                                            <span class="right badge badge-danger">{{ $izinStatusCount ?? '0' }}</span>
                                        @endif
                                    </p>
                                </a>
                            </li>
                        @endif
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
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <h4 class="float-sm-right">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</h4>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @yield('content')

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }}</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>t>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        });

        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        document.querySelector('.form-control-sidebar').addEventListener('input', function() {
            let query = this.value.toLowerCase(); // Ambil nilai input dan ubah ke huruf kecil
            let menuItems = document.querySelectorAll('.nav-item'); // Ambil semua item menu

            menuItems.forEach(item => {
                let name = item.getAttribute('data-name'); // Ambil data-name setiap item
                if (name.toLowerCase().includes(query)) {
                    item.style.display = ''; // Tampilkan item jika cocok
                } else {
                    item.style.display = 'none'; // Sembunyikan item jika tidak cocok
                }
            });
        });
    </script>
    @stack('custom-script')
</body>

</html>
