@extends('templates.index')
@section('title', 'Mutiara Optik - Daftar Transaksi')
@section('daftar-transaksi', 'active')

@section('container')
    <!-- Begin Page Content -->

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Transaksi</h1>
            <p class="mb-4">Daftar Transaksi Mutiara Optik </p>
  
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
              </div>
              <div class="card-body">
                    <div class="row justify-content-end mb-3 mx-1">
                        <form action="/transaction/list-transaction" method="get" class="">
                            <div class="input-group">
                                Cari Transaksi : &nbsp; <input type="search" name="search" id="" class="form-control form-control-sm">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary rounded-right btn-sm" id="s"><i class="fas fa-search"></i></button>
                                  </div>
                            </div>
                        </form>
                    </div>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="5%" ><b>#</b></th>
                        <th>No. Transaksi</th>
                        <th>Nama Pasien</th>
                        <th>Tipe Lensa</th>
                        <th>No. BPJS (*)</th>
                        <th>Status Bayar</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td align="center"><b>{{$loop->iteration}}</b></td>
                            <td>{{$transaction->no_transaksi}}</td>
                            <td>{{$transaction->patient->nama_pasien}}</td>
                            <td>{{$transaction->lens_type}}</td>
                            @if ($transaction->bpjs_status == "0")
                                <td align="center">
                                    <b> - </b>
                                </td>                                
                            @else
                                <td>
                                    {{$transaction->patient->no_bpjs}}
                                </td>
                            @endif
                            @if ($transaction->transaction_status == "0")
                                <td align="center">
                                    <b class="text-success">LUNAS</b>
                                </td>
                                <td width="16%">
                                    <button href="" class="btn btn-sm btn-success" disabled>Ubah Data</button>
                                <a class="btn btn-sm btn-info detail-data" href="#" data-toggle="modal" data-target="#detailTransaksi" id="{{$transaction->id}}">
                                        Detail
                                      </a>
                                </td>
                            @else
                                <td align="">
                                    <b class="text-danger">BELUM LUNAS</b>
                                </td>
                            </td>
                            <td width="16%">
                                <a href="" class="btn btn-sm btn-success">Ubah Data</a>
                                <a class="btn btn-sm btn-info detail-data" href="#" data-toggle="modal" data-target="#detailTransaksi" id="{{$transaction->id}}">
                                    Detail
                                  </a>
                            </td>
                            @endif
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p><b>*</b><small class="text-muted">) Jika no BPJS tidak ada, maka transaksi tidak menggunakkan BPJS</small></p>
                    <div class="row justify-content-around">
                        
                        <div class="col-4">
                            Halaman {{$transactions->currentPage()}}
                        </div>
                        <div class="col-3">
                            Menampilkan {{$transactions->count()}} 
                            Dari {{$transactions->total()}} data
                        </div>
                        <div class="col-2">
                            {{$transactions->links()}}
                        </div>


                </div>
              </div>
            </div>
  
          </div>
          <!-- /.container-fluid -->
  
        </div>
        <!-- End of Main Content -->
@endsection