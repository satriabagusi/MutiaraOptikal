@extends('templates.transaction')
@section('title', 'Mutiara Optik - Daftar Transaksi')

@section('container')
    <!-- Begin Page Content -->

    <!-- Image and text -->


        <div class="container-fluid mt-5">

            <!-- Page Heading -->
            <div class="row justify-content-start mb-4">
              <div class="col-12">
                <h1 class="display-5 mb-0 text-white"> <a href="/home" class="btn btn-lg btn-warning rounded-circle"><i class="fas fa-arrow-left"></i></a> Cetak Resi Transaksi </h1>
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
                                    <button type="submit" class="btn btn-info mb-2 btn-receipt"><i class="fas fa-search"></i> Cari</button>
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

            <div class="row justify-content-center mt-3 pt-3" style="display: none;" id="receipt-detail">
                
              
              <div class="col-6">
                    <div class="card text-center">
                      <div class="card-header bg-info text-white border-bottom-info">Detail Transaksi
                        <button type="button" class="close" onclick="closeCard()">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                        <div class="card-body">
                            <form >
                                <h3 id="no_transaksi" class="font-weight-bolder text-danger mb-4">NO.TRANSAKSI</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputNama">Nama Pasien</label>
                                        <input type="text" class="form-control" id="inputNama" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_hp">No Handphone</label>
                                        <input type="text" class="form-control" id="no_hp" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bpjs_status">BPJS ?</label>
                                        <input type="text" class="form-control" id="bpjs_status" readonly>
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
                                    <label for="inputTipeLensa">Tipe Lensa</label>
                                    <input type="text" class="form-control" id="inputTipeLensa" readonly>
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
                                <div class="form-row justify-content-end mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputTotal">Total Transaksi</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                          </div>
                                          <input type="text" class="form-control"  id="inputTotal" readonly>
                                        </div>
                                      </div>
                                </div>
                                  
                                <a target="_blank" href="" id="print-btn" name="btnSubmit" class="btn btn-info"><i class="fas fa-print"></i> Print/Cetak Resi</a>
                              </form>
                        </div>
                        </div>
                </div>
            </div>
  
          </div>
          <!-- /.container-fluid -->
@endsection