@extends('templates.transaction')
@section('title', 'Mutiara Optik - Daftar Transaksi')

@section('container')
    <!-- Begin Page Content -->

    <!-- Image and text -->


        <div class="container-fluid mt-5">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-white">Aplikasi Penjualan</h1>
  
            <!-- DataTales Example -->
            <div class="row justify-content-center mt-3 pt-3">
                <div class="col-auto">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                          <h2 class="card-title"><i class="text-success fas fa-edit"></i></h2>
                          <p class="card-text">Transaksi Baru</p>
                          <a href="/transaction/new-transaction" class="btn btn-success"><i class=" fas fa-edit"></i> Buat Transaksi Baru</a>
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
                        <h2 class="card-title"><i class="text-danger fas fa-list-ul"></i></h2>
                        <p class="card-text">Daftar Transaksi</p>
                        <a href="/patient/new-patient" class="btn btn-danger"><i class="fas fa-user-edit"></i> Daftar Transaksi</a>
                      </div>
                    </div>
              </div>
            </div>
  
          </div>
          <!-- /.container-fluid -->
@endsection