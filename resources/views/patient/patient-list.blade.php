@extends('templates.index')
@section('title', 'Mutiara Optik - Daftar Pasien')
@section('daftar-pasien', 'active')

@section('container')
    <!-- Begin Page Content -->

        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Daftar Pasien</h1>
            <p class="mb-4">Daftar Pasien Mutiara Optik yang terdaftar</p>
  
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien</h6>
              </div>
              <div class="card-body">
                    <div class="row justify-content-end mb-3 mx-1">
                        <form action="/patient/list-patient" method="get" class="">
                            <div class="input-group">
                                Cari Pasien : &nbsp; <input type="search" name="s" id="" class="form-control form-control-sm">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary rounded-right btn-sm" id="s"><i class="fas fa-search"></i></button>
                                  </div>
                            </div>
                        </form>
                    </div>
                    @if ($patients == "0")
                    <div class="row justify-content-center">
                        <div class="col-auto my-5 text-center">
                        
                            <h2>Data Pasien tidak ditemukan/Belum Terdaftar !</h2>
                            <img class="img-fluid" src="{{url('img/no_data.svg')}}" width="350">
                            <br>

                            <small>Daftarkan Pasien <a href="/patient/new-patient">klik disini.</a></small>
                        </div>
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                          <tr>
                              <th width="5%" ><b>#</b></th>
                              <th>Nama Pasien</th>
                              <th>No. HP</th>
                              <th>No. BPJS</th>
                              <th>Opsi</th>
                          </tr>
                          </thead>
                          <tbody>
                              @foreach ($patients as $patient)
                              <tr>
                                  <td align="center"><b>{{$loop->iteration}}</b></td>
                                  <td>{{$patient->nama_pasien}}</td>
                                  <td>{{$patient->no_hp}}</td>
                                  @if ($patient->no_bpjs == "")
                                      <td align="center">
                                          <b> - </b>
                                      </td>                                
                                  @else
                                      <td>
                                          {{$patient->no_bpjs}}
                                      </td>
                                  @endif
                                  </td>
                                  <td width="15%" align="center">
                                      X
                                      {{-- <a href="" class="btn btn-sm btn-info">Detail</a>
                                      <a href="" class="btn btn-sm btn-info">Ubah Data</a>
                                      <a href="" class="btn btn-sm btn-info">Detail</a> --}}
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>

                  
                  
                  <div class="row justify-content-around">
                        <div class="col-4">
                            Halaman {{$patients->currentPage()}}
                        </div>
                        <div class="col-3">
                            Menampilkan {{$patients->count()}} 
                            Dari {{$patients->total()}} data
                        </div>
                        <div class="col-4">
                            {{$patients->links()}}
                        </div>
                        
                        
                    </div>
                    @endif
              </div>
            </div>
  
          </div>
          <!-- /.container-fluid -->
  
        </div>
        <!-- End of Main Content -->
@endsection