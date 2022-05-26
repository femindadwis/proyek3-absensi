<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="E-Absensi">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Absensi') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <!-- Ajax -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css')}}">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url()->current() }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fab fa-autoprefixer"></i>
                </div>
                <div class="sidebar-brand-text mx-3">E-Absensi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            {{-- @if(Auth::user()->level_code == 'adm') --}}
            <!-- Nav Item - Dashboard -->
            <li class="nav-item home">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>

            <!-- Nav Item - Produksi -->
            {{--        <li class="nav-item {{ Nav::isRoute('production.index') }}">
            <a class="nav-link" href="{{ route('production.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Produksi') }}</span>
            </a>
            </li>--}}

            <!-- Nav Item - Jadwal -->
            {{-- <li class="nav-item {{ Nav::isRoute('schedule.index') }}">
            <a class="nav-link" href="{{ route('schedule.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Jadwal') }}</span>
            </a>
            </li> --}}

            <!-- Nav Item - Shift -->
            {{-- <li class="nav-item {{ Nav::isRoute('shift.index') }}">
            <a class="nav-link" href="{{ route('shift.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Shift') }}</span>
            </a>
            </li> --}}


            <!-- Divider -->
            {{--<hr class="sidebar-divider">

        <!-- Heading -->
        <div class = "sidebar-heading">
            {{ __('Akun') }}
    </div>

    <!-- Nav Item - User -->
    <li class="nav-item {{ Nav::isRoute('user.index') }}">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('User') }}</span>
        </a>
    </li>--}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Report') }}
    </div>
    --}}
    @if(Auth::user()->is_admin == '1')
    <li class="nav-item Absensi">
        <a class="nav-link" href="{{ route('Absensi.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('Absensi') }}</span>
        </a>
    </li>
        @endif
    {{-- @if(Auth::user()->level_code == 'adm') --}}
    {{-- <li class="nav-item Komponen Gaji">
        <a class="nav-link" href="{{ route('komponen-gaji.index') }}">
    <i class="fas fa-fw fa-user"></i>
    <span>{{ __('Komponen Gaji') }}</span>
    </a>
    </li> --}}

    {{-- <li class="nav-item Penggajian">
        <a class="nav-link" href="{{ route('penggajian.index') }}">
    <i class="fas fa-fw fa-user"></i>
    <span>{{ __('Laporan Penggajian') }}</span>
    </a>
    </li> --}}
    {{-- @endif --}}
    <!-- Divider -->
    {{-- <hr class="sidebar-divider">

    <li class="nav-item Laporan">
        <a class="nav-link" href="{{ route('laporan.index') }}">
    <i class="fas fa-fw fa-user"></i>
    --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider"> --}}
    {{-- @if(Auth::user()->is_Admin == 'adm') --}}
    <!-- Heading -->
    {{-- <div c  <span>{{ __('Laporan') }}</span>
    </a>
    </li> lass="sidebar-heading">
    {{ __('Master Pages') }}
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            
            <i class="fas fa-fw fa-folder"></i>
            
            <span>Data Master</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            
                <h6 class="collapse-header">Master Screens:</h6>
                @if(Auth::user()->is_admin == '2')
                <a class="collapse-item" href="{{ route('MstAdmin.index') }}">{{ __('admin') }}</a> 
                @endif
                @if(Auth::user()->is_admin == '1')
                <a class="collapse-item" href="{{ route('MstKaryawan.index') }}">{{ __('Karyawan') }}</a> 
                <a class="collapse-item" href="{{ route('MstJabatan.index') }}">{{ __('Jabatan') }}</a>
                <a class="collapse-item" href="{{ route('MstLokasi.index') }}">{{ __('Lokasi') }}</a>
               @endif
                {{-- <a class="collapse-item" href="{{ route('mst-potongan.index') }}">{{ __('Potongan') }}</a>
                <a class="collapse-item" href="{{ route('mst-bonus.index') }}">{{ __('Bonus') }}</a> --}}
                {{-- <a class="collapse-item" href="{{ route('mst-kategori.index') }}">{{ __('Kategori') }}</a> --}}
                {{-- <div class="collapse-divider"></div> --}}
                {{-- <h6 class="collapse-header">Akun Pages:</h6> --}}
                {{-- <a class="collapse-item" href="{{ route('user.index') }}">{{ __('User') }}</a> --}}
                {{-- <a class="collapse-item" href="{{ route('mst-role.index') }}">{{ __('Role') }}</a> --}}
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    {{-- @endif --}}
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold"
                                data-initial="{{Auth::user()->name[0]}}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            {{--<a class="dropdown-item" href="{{ route('profile') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            {{ __('Profile') }}
                            </a>--}}
                            {{--<a class="dropdown-item" href="javascript:void(0)">
                                <i class = "fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Settings') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Activity Log') }}
                            </a>--}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; E-Absensi 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Kembali') }}</button>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    {{-- <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script> --}}

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js')}}"></script>
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> --}}
    <script src="{{ asset('vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script>
        $(function () {
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
            });
        });

    </script>
    <script>
        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

    </script>

    @yield('js')
</body>

</html>
