
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

  {{-- paper style css --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
  <style>
      @media print {
          body {
              width: 21cm;
              height: 29.7cm;
              margin-top: 15mm;
              margin-left: 15mm;
              margin-bottom: 15mm;
          }
          #printbtn {
            display: none;
          }
      }
  </style>

</head>

<body id="page-top">

    <div class="container-fluid my-3">
        @yield('container')
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
