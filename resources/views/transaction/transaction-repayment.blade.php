@extends('templates.transaction')
@section('title', 'Mutiara Optik - Daftar Transaksi')

@section('container')
    <!-- Begin Page Content -->

    <!-- Image and text -->


        <div class="container-fluid mt-5">

            <!-- Page Heading -->
            <div class="row justify-content-start mb-4">
              <div class="col-12">
                <h1 class="display-5 mb-0 text-white"> <a href="/home" class="btn btn-lg btn-warning rounded-circle"><i class="fas fa-arrow-left"></i></a> Pelunasan Transaksi / Ambil Kacamata</h1>
              </div>
            </div>
  
            <!-- DataTales Example -->
            <div class="row justify-content-center mt-3 pt-3">
                <div class="col-auto">
                    <div class="card text-center">
                        <div class="card-body">
                            <p>Cari Transaksi</p>
                                <div class="input-group">
                                <input type="text" class="id form-control" id="id" placeholder="No.Transaksi">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-info mb-2 btn-repayment"><i class="fas fa-search"></i> Cari</button>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
              <div class="spinner-border text-light mt-lg-5" id="loading-wait"  style="width: 3rem; height: 3rem;display: none;" role="status" >
                <span class="sr-only">Loading...</span>
              </div>
            </div>

            <div class="row justify-content-center mt-3 pt-3" style="display: none;" id="card-detail">
                
              
              <div class="col-6">
                    <div class="card text-center">
                      <div class="card-header bg-info text-white border-bottom-info">Detail Transaksi
                        <button type="button" class="close" onclick="closeCard()">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="card-body">
                            <form action="{{route('save-repayment')}}" method="POST">
                              @csrf
                              
                                <div class="form-row">
                                  <input type="hidden" name="no_transaksi">
                                  <div class="form-group col-md-4">
                                    <label for="inputNama">Nama Pasien</label>
                                    <input type="nama_pasien" class="form-control" id="inputNama" readonly>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputNoHP">No HP</label>
                                    <input type="text" class="form-control" id="inputNoHP" readonly>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="inputNoBPJS">No BPJS</label>
                                    <input type="text" class="form-control" id="inputNoBPJS" readonly>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputJenisLensa">Jenis Lensa</label>
                                    <input type="text" class="form-control" id="inputJenisLensa" readonly>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputHargaLensa">Harga Lensa</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                      </div>
                                      <input type="text" class="form-control"  id="inputHargaLensa" readonly>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputTipeFrame">Tipe Frame</label>
                                    <input type="text" class="form-control" id="inputTipeFrame" readonly>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputHargaFrame">Harga Frame</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                      </div>
                                      <input type="text" class="form-control"  id="inputHargaFrame" readonly>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputBayarAwal">Pembayaran awal </label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                      </div>
                                      <input type="text" class="form-control"  id="inputBayarAwal" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputTotalTransaksi">Total Transaksi</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                      </div>
                                      <input type="text" class="form-control"  id="inputTotalTransaksi" readonly>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="form-group col-md-6">
                                    <label for="inputPembayaran">Jumlah yang harus dibayarkan</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                      </div>
                                      <input type="text" name="total_bayar" class="form-control"  id="inputPembayaran" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="inputKonfirmasiPembayaran">Konfirmasi Jumlah Pembayaran</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                      </div>
                                      <input type="text" name="pembayaran" class="form-control @error('pembayaran') is-invalid @enderror"  id="inputKonfirmasiPembayaran" value={{old('pembayaran')}}>
                                      <span id="totalPay" class="invalid-feedback" style="display: none;" role="alert">
                                          <strong>Pembayaran harus sesuai dengan jumlah yang dibayarkan</strong>
                                      </span>
                                    </div>
                                  </div>
                                  <input type="hidden" name="id_transaksi" id="id_transaksi">
                                </div>
                                <button type="submit" name="btnSubmit" class="btn btn-danger">LUNAS / AMBIL KACAMATA</button>
                                <p for="" class="small text-danger">klik lunas jika sudah sesuai</p>
                              </form>
                        </div>
                        </div>
                </div>
            </div>
  
          </div>
          <!-- /.container-fluid -->
@endsection