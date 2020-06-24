
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="{{url('css/sb-admin-2.min.css')}}" rel="stylesheet">

  <link href="{{url('vendor/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">

  {{-- SweetAlert2 --}}
  <link rel="stylesheet" type="text/css" href="{{url('css/sweetalert2.css')}}">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2 ">{{config('app.name')}}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      @if (Auth::user()->user_role==1)
      <!-- Nav Item - Dashboard -->
      <li class="nav-item @yield('dashboard')">
        <a class="nav-link " href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </li>
        
        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Heading -->
        <div class="sidebar-heading">
          Pasien
        </div>
        
        <!-- Nav Item - Pasien -->
          
          <!-- Nav Item - Pasien -->
          <li class="nav-item @yield('daftar-pasien') ">
            <a class="nav-link" href="/patient/list-patient">
              <i class="fas fa-list-ol"></i>
              <span>Daftar Pasien</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            <!-- Heading -->
            <div class="sidebar-heading">
              Transaksi
            </div>
            
            <!-- Nav Item - Pasien -->
              
              <!-- Nav Item - Pasien -->
              <li class="nav-item @yield('daftar-transaksi') ">
                <a class="nav-link" href="/transaction/list-transaction">
                  <i class="fas fa-list-ol"></i>
                  <span>Daftar Transaksi</span></a>
                </li>

          
      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <div class="sidebar-heading">
        Admin Control
      </div>
      
      <!-- Nav Item - Admin Control -->
      <li class="nav-item @yield('tambah-pegawai')">
        <a class="nav-link" href="/admin/add-employee">
          <i class="fas fa-user-edit"></i>
          <span>Tambah Pegawai</span></a>
        </li>
        
        <li class="nav-item @yield('tambah-frame')">
          <a class="nav-link" href="/admin/add-frame">
            <i class="fas fa-glasses"></i>
            <span>Tambah Data Frame</span></a>
          </li>

          <li class="nav-item @yield('stock-frame')">
            <a class="nav-link" href="/admin/add-frame">
              <i class="fas fa-glasses"></i>
              <span>Stock Frame</span></a>
            </li>
          
          @endif
      <!-- Divider -->
      <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
        Account Setting
      </div>

      <!-- Nav Item - Admin Control -->
      <li class="nav-item @yield('my-account')">
          <a class="nav-link" href="/account">
            <i class="fas fa-user-cog"></i>
          <span>Akun Saya</span></a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="{{route('logout')}}">
          <i class="fas fa-sign-out-alt"></i>
        <span>Log Out</span></a>
    </li>

      
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
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{url('img/avatar.png')}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/account">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="/account/edit">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        @yield('container')

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container">
          <div class="copyright text-center">
            <span>Copyright &copy; ZeenyPOS by <a href="http://instagram.com/satriabagus_" target="_blank">Satria Bagus</a> {{date("Y")}}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih logout untuk keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="detailTransaksi" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            Detail Transaksi
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('vendor/jquery/jquery.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

  <!-- Bootstrap Select JavaScript-->
  <script src="{{url('vendor/bootstrap-select/js/bootstrap-select.js')}}"></script>

  <!-- JQuery Mask JavaScript-->
  <script src="{{url('vendor/jquery-mask/jquery.mask.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('vendor/jquery-easing/jquery.easing.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('js/sb-admin-2.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{url('vendor/chart.js/Chart.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{url('js/demo/chart-area-demo.js')}}"></script>
  <script src="{{url('js/demo/chart-pie-demo.js')}}"></script>

  <!------ SweetAlert2 ------->
  <script src="{{url('js/sweetalert2.all.js')}}"></script>
  @include('sweet::alert')
  
    
  <script src="{{url('js/script.js')}}"></script>



</body>

</html>
