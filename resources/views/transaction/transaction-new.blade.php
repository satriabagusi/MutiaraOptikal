@extends('templates.transaction')
@section('title', 'Mutiara Optik - New Transaction ')
@section('transaksi-baru', 'active')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      @if (Session::has('status'))
      <div aria-live="polite" aria-atomic="true" style="position: absolute">
        <div class="toast bg-light rounded-lg" data-animation="true" data-delay="5000" data-autohide="false" style="position: absolute; top: 0; right: 0;">
          <div class="toast-header">
            <span class="rounded mr-2 bg-success" style="width: 15px;height: 15px"></span>
            <strong class="mr-auto text-bold text-black-50 mr-2">Mutiara Optik - {{Auth::user()->name}}</strong>
            <small>{{date('H:i:s')}}</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            {{ Session::get('status') }}
            <br/>
          </div>
        </div>
      </div>
      @endif

        <!-- Page Heading -->
          <div class="row justify-content-start mb-4">
            <div class="col-5">
              <h1 class="display-4 mb-0 text-white"> <a href="/home" class="btn btn-lg btn-warning rounded-circle"><i class="fas fa-arrow-left"></i></a> Transaksi Baru</h1>
            </div>
          </div>

        <!-- Content Row -->
        <div class="row justify-content-center">
          <div class="col">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaksi baru</h6>
              </div>
              <div class="card-body px-5">
            
          <form action="{{route('save-transaction')}}" method="POST" class="mb-5">
            @csrf
            <div class="row">
              <div class="col-6">
                
              <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <select class="form-control selectpicker border pb-2" data-live-search="true" id="id_pasien" name="id_pasien">
                  @foreach ($patients as $patient)
                <option data-patient="{{$patient->id}}" value="{{$patient->id}}">{{$patient->nama_pasien}} - {{$patient->no_hp}}</option>
                  @endforeach
                  </select>
                @error('nama_pasien')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              
              {{-- INPUT HIDDEN NAME --}}
              <input type="hidden" name="nama_pasien" id="nama_pasien">
              <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
              
              <div class="form-group">
                <label for="no_hp">No. Handphone</label>
                <input type="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="NO HP" name="no_hp" id="no_hp" autocomplete="off" readonly value={{old('no_hp')}}>
                @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <label for="no_bpjs">Transaksi dengan BPJS?</label>
              <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bpjs_status" id="ya" value="1">
                <label class="form-check-label" for="ya">Ya</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bpjs_status" id="tidak" value="0" checked="checked">
                <label class="form-check-label" for="tidak">Tidak</label>
              </div>

              <div class="form-group mt-4">
                <label for="no_bpjs" id="label_bpjs">No. BPJS</label>
                <input type="no_bpjs" class="form-control @error('no_bpjs') is-invalid @enderror" placeholder="NO BPJS" name="no_bpjs" id="no_bpjs"autocomplete="off" readonly value={{old('no_bpjs')}}>
                <small id="note_bpjs">*Jika pasien merupakan peserta BPJS isi inputan NO BPJS</small>
                @error('no_bpjs')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              </div>

              <div class="col-6">

                <div class="form-group">
                  <label for="id_frame">Merk Frame </label>
                      <select class="form-control selectpicker border pb-2" data-live-search="true" id="id_frame" name="id_frame">
                      @foreach ($frames as $frame)
                      <option data-brand="{{$frame->id}}" value="{{$frame->id}}">{{$frame->frame_type}} {{$frame->price}}</option>
                      @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="frame_prices">Harga Frame</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Rp. </span>
                      </div>
                    <input type="frame_prices" class="form-control @error('frame_prices') is-invalid @enderror" placeholder="-" name="frame_prices" id="frame_prices" autocomplete="off" readonly value={{old('frame_prices')}}>
                    @error('frame_prices')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="frame_price">Jenis Lensa</label>
                    <input type="lens_type" class="form-control @error('lens_type') is-invalid @enderror" placeholder="" name="lens_type" id="lens_type" autocomplete="off" value={{old('lens_type')}}>
                    @error('lens_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="lens_price">Harga Lensa</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <span class="input-group-text">Rp. </span>
                      </div>
                    <input type="lens_price" class="form-control @error('lens_price') is-invalid @enderror" placeholder="-" name="lens_price" id="lens_price" autocomplete="off"  value={{old('lens_price')}}>
                    @error('lens_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  </div>

              </div>
            </div>
                <hr>
                <h4>Konfirmasi Transaksi</h4>
            <div class="row">

              <div class="col-6">
                <div class="form-group">
                  <label for="total_transaction">Total Transaksi</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                    </div>
                  <input type="total_transaction" class="form-control @error('total_transaction') is-invalid @enderror" placeholder="-" name="total_transaction" id="total_transaction" autocomplete="off" readonly value={{old('total_transaction')}}>
                  @error('total_transaction')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
                </div>
              </div>

              <div class="col-6">
                  <div class="form-group">
                  <label for="total_pay">Total Pembayaran</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rp. </span>
                    </div>
                  <input type="total_pay" class="form-control @error('total_pay') is-invalid @enderror" placeholder="-" name="total_pay" id="total_pay" autocomplete="off"  value={{old('total_pay')}}>
                  @error('total_pay')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="keterangan">Keterangan Transaksi</label>
              <textarea class="form-control" id="keterangan" rows="3" name="keterangan"></textarea>
            </div>

              <div class="row justify-content-end">
                <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-plus-circle"></i> Simpan Transaksi
                </button>
              </div>
          </form>

        </div>
      </div>

    </div>

          
          </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection