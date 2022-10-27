<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{csrf_token()}}">
        
        <link rel="icon" href="panel/assets/images/bnlogo.png" >
        <!--Page title-->
        <title>Dapur Negeriku</title>
        <!--bootstrap-->
        <link rel="stylesheet" href="{{ asset('panel/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
        <!--font awesome-->
        <link rel="stylesheet" href="{{ asset('panel/assets/css/all.min.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
        <!-- metis menu -->
        <link rel="stylesheet" href="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css') }}">
        <!-- chart -->
        <script src="{{ asset('panel/assets/js/jquery.min.js') }}"></script>
        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
        <!--Custom CSS-->
        <link rel="stylesheet" href="{{ asset('panel/assets/css/style.css') }}">

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- jquery -->
        <script src="{{ asset('panel/assets/js/jquery.min.js') }}"></script>
        <!-- popper Min Js -->
        <script src="{{ asset('panel/assets/js/popper.min.js') }}"></script>
        <!-- Bootstrap Min Js -->
        <script src="{{ asset('panel/assets/js/bootstrap.min.js') }}"></script>
        <!-- Fontawesome-->
        <script src="{{ asset('panel/assets/js/all.min.js') }}"></script>
        <!-- metis menu -->
        <script src="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js') }}"></script>
        <script src="{{ asset('panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js') }}"></script>
        <!-- nice scroll bar -->
        <script src="{{ asset('panel/assets/plugins/scrollbar/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('panel/assets/plugins/scrollbar/scroll.active.js') }}"></script>
        <!-- counter -->
        <script src="{{ asset('panel/assets/plugins/counter/js/counter.js') }}"></script>
        <!-- chart -->
   <script src="{{ asset('panel/assets/plugins/chartjs-bar-chart/Chart.min.js') }}"></script>
        <script src="{{ asset('panel/assets/plugins/chartjs-bar-chart/chart.js') }}"></script>
        <!-- pie chart -->
        <script src="{{ asset('panel/assets/plugins/pie_chart/chart.loader.js') }}"></script>
        <script src="{{ asset('panel/assets/plugins/pie_chart/pie.active.js') }}"></script>
 
 
        <!-- Main js -->
        <script src="{{ asset('panel/assets/js/main.js') }}"></script>
       
    </head>
    <body id="page-top">
        <!-- preloader -->
        <div class="preloader">
            <img src="{{ asset('panel/assets/images/preloader.gif') }}" alt="">
        </div>
        <!-- wrapper -->
        <div class="wrapper">
            <!-- header area -->
  <header class="header_area">
                <!-- logo -->
                <div class="sidebar_logo">
                    <a href="index.html">
  <img src="{{ asset('panel/assets/images/bnlogo.png') }}" alt="" class="img-fluid logo1" style="width:70px; margin-top: -10px;"><h3 style="margin-left: 68px; margin-top: 8px; color:#4b5e20; font-weight:bold; font-family: 'Ubuntu', sans-serif;">Dapurku</h3>
   <img src="{{ asset('panel/assets/images/bnlogo.png') }}" alt="" class="img-fluid logo2">
                    </a>
                </div>
                <div class="sidebar_btn">
                    <button class="sidbar-toggler-btn"><i class="fas fa-bars"></i></button>
                </div>
                <ul class="header_menu">
              
                    <li><a data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>
                            <div class="user_item dropdown-menu dropdown-menu-right">
                            <ul>
                                
                                <li>
                                
                                    <a href="{{ route('logout') }}"><span><i class="fas fa-unlock-alt"></i></span> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>

                        <a class="responsive_menu_toggle" href="#"><i class="fas fa-bars"></i></a></li>
                </ul>
            </header><!-- / header area -->
            <!-- sidebar area -->
            <aside class="sidebar-wrapper ">
              <nav class="sidebar-nav">
                 <ul class="metismenu" id="menu1">
                 <li class="single-nav-wrapper">
                        <a href="{{ route('dashboard') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-th-large"></i></span>
                            <span class="menu-text">Dashboard</span>
                        </a>
                      </li>
                      @if (auth()->user()->roles[0]['name'] == "admin")
                 <li class="header ml-2 mt-2">Cafe</li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('kategori.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-th-large"></i></span>
                            <span class="menu-text">Kategori</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('produk.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-book"></i></span>
                            <span class="menu-text">Menu</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('penjualan.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-cart-plus"></i></span>
                            <span class="menu-text">Kasir</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('riwayatpenjualan.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="menu-text">Penjualan</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file" "></i></span>
                            <span class="menu-text">Laporan Harian</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.bulanan') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file" ></i></span>
                            <span class="menu-text">Laporan Bulanan</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.piutang') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file" ></i></span>
                            <span class="menu-text">Laporan Piutang</span>
                        </a>
                      </li>
                      <!-- <li class="single-nav-wrapper">
                        <a href="{{ route('riwayatpenjualan.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="menu-text">Penjualan</span>
                        </a>
                      </li> -->
                      <li class="header ml-2">Cathering</li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('penjualanpo.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-cart-plus"></i></span>
                            <span class="menu-text">Kasir Cathering</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('riwayatpenjualanpo.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-shopping-cart"></i></span>
                            <span class="menu-text">Penjualan Cathering</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.po') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file"></i></span>
                            <span class="menu-text">Laporan Harian Cathering</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.bulananpo') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file"></i></span>
                            <span class="menu-text">Laporan Bulanan Cathering</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.piutangpo') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file"></i></span>
                            <span class="menu-text">Laporan Piutang Cathering</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.jadwalpo') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file"></i></span>
                            <span class="menu-text">Laporan Jadwal Cathering</span>
                        </a>
                      </li>
                      
                      <li class="header ml-2 mt-2">User Order</li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.jadwalpo') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file"></i></span>
                            <span class="menu-text">Laporan Jadwal Cathering</span>
                        </a>
                      </li>

                      <li class="header ml-2 mt-2">Add User</li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('user') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-user"></i></span>
                            <span class="menu-text">User</span>
                        </a>
                      </li>
                      @else
                      <li class="header ml-2">Cafe</li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('penjualan.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-cart-plus"></i></span>
                            <span class="menu-text">Kasir</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('riwayatpenjualan.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="menu-text">Penjualan</span>
                        </a>
                      </li>
                      <li class="header ml-2">Pre Order</li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('penjualanpo.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-cart-plus"></i></span>
                            <span class="menu-text">Kasir Po</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('riwayatpenjualanpo.index') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-shopping-cart"></i></span>
                            <span class="menu-text">Penjualan Po</span>
                        </a>
                      </li>
                      <li class="single-nav-wrapper">
                        <a href="{{ route('laporan.jadwalpo') }}" class="menu-item">
                            <span class="left-icon"><i class="fa fa-file"></i></span>
                            <span class="menu-text">Laporan Jadwal Po</span>
                        </a>
                      </li>
                    </ul>
                @endif
              </nav>
            </aside><!-- /sidebar Area-->


        @yield('content')

        </div><!--/ wrapper -->


       
        @yield('script')
        @include('sweetalert::alert')

     


    </body>
</html>