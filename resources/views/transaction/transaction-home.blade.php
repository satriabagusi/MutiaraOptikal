@extends('templates.transaction')
@section('title', 'Mutiara Optik - Daftar Transaksi')

@section('container')
    <!-- Begin Page Content -->

    <!-- Image and text -->


    
    @if (Session::has('message'))
    <div role="alert" aria-live="assertive" aria-atomic="true" class="toast mr-5" style="position: absolute; top: 25; right:0;z-index: 9999;" data-autohide="false">
      <div class="toast-header">
        <img src="{{url('img/avatar.png')}}" width="20px" class="rounded mr-2" alt="...">
        <strong class="mr-auto">Mutiara Optikal</strong>
        <small>{{date('H:i:s')}}</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        {{ Session::get('message') }}
      </div>
    </div>
    @endif

        <div class="container-fluid mt-5">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-white">Aplikasi Penjualan</h1>
  
            <!-- DataTales Example -->
            <div class="row justify-content-center mt-3 pt-3">
                <div class="col-auto">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h2 class="card-title"><i class="text-success fas fa-edit"></i></h2>
                          <p class="card-text lead">Transaksi Baru</p>
                          <a href="/transaction/new-transaction" class="btn btn-success "><i class=" fas fa-edit"></i> Buat Transaksi Baru</a>
                        </div>
                      </div>
                </div>
                <div class="col-auto">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h2 class="card-title"><i class="text-info fas fa-glasses"></i></h2>
                          <p class="card-text">Pelunasan/Ambil Kacamata</p>
                          <a href="/transaction/repayment/" class="btn btn-info"><i class="fas fa-glasses"></i> Pelunasan/Ambil</a>
                        </div>
                      </div>
                </div>
                <div class="col-auto">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h2 class="card-title"><i class="text-warning fas fa-user-edit"></i></h2>
                          <p class="card-text">Pendaftaran Pasien Baru</p>
                          <a href="/patient/new-patient" class="btn btn-warning"><i class="fas fa-user-edit"></i> Daftar Pasien Baru</a>
                        </div>
                      </div>
                </div>
                <div class="col-auto">
                  <div class="card text-center" style="width: 18rem;">
                      <div class="card-body">
                        <h2 class="card-title"><i class="text-danger fas fa-print"></i></h2>
                        <p class="card-text">Cetak Resi Transaksi</p>
                        <a href="/transaction/receipt/find" class="btn btn-danger"><i class="fas fa-print"></i> Cetak Transaksi</a>
                      </div>
                    </div>
              </div>
            </div>

            
  
          </div>
          <!-- /.container-fluid -->
@endsection