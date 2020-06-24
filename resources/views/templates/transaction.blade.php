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
  <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('css/sb-admin-2.min.css')}}" rel="stylesheet">

  <link href="{{url('vendor/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">

  {{-- SweetAlert2 --}}
  <link rel="stylesheet" type="text/css" href="{{url('css/sweetalert2.css')}}">

</head>

<body class="bg-gradient-primary">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <a class="navbar-brand" href="#">Mutiara Optikal</a>
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

         
          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600">{{Auth::user()->name}}</span>
              <img class="img-profile rounded-circle" src="{{url('img/avatar.png')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <p class="dropdown-item" href="">
                <img class="img-profile rounded-circle mr-2" width="16px" src="{{url('img/avatar.png')}}">
                {{Auth::user()->name}}
              </p>
              <div class="dropdown-divider"></div>
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

  @yield('container')

  <!-- Footer -->
  <footer class="sticky-footer text-white mt-lg-5">
    <div class="container">
      <div class="copyright text-center">
        <span>Copyright &copy; ZeenyPOS by <a class="text-warning text-decoration-none" href="http://instagram.com/satriabagus_" target="_blank">Satria Bagus</a> {{date("Y")}}</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

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
