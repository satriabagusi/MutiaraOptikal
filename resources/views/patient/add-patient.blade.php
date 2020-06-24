@extends('templates.transaction')
@section('title', 'Mutiara Optik - Add Employee')
@section('tambah-pasien', 'active')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      @if (Session::has('status'))
      <div aria-live="polite" aria-atomic="true" style="position: relative">
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
          <div class="col-8">
            <h1 class="display-4 mb-0 text-white"> <a href="/home" class="btn btn-lg btn-warning rounded-circle"><i class="fas fa-arrow-left"></i></a> Pendaftaran Pasien Baru</h1>
          </div>
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center">
          <div class="col">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pasien Baru</h6>
              </div>
              <div class="card-body px-5">
                
              

            
          <form action="{{route('add-patient')}}" method="POST" class="mb-5">
            @csrf
              <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror" placeholder="Nama Pasien" name="nama_pasien" autocomplete="off" value={{old('nama_pasien')}} >
                @error('nama_pasien')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="no_hp">No. Handphone</label>
                <input type="no_hp" class="form-control @error('no_hp') is-invalid @enderror" placeholder="NO HP" name="no_hp" id="no_hp" autocomplete="off" value={{old('no_hp')}}>
                @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="no_bpjs">No. BPJS</label>
                <input type="no_bpjs" class="form-control @error('no_bpjs') is-invalid @enderror" placeholder="NO BPJS" name="no_bpjs" id="no_bpjs_add"autocomplete="off" value={{old('no_bpjs')}}>
                <small>*Jika pasien merupakan peserta BPJS isi inputan NO BPJS</small>
                @error('no_bpjs')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="row justify-content-end">
                <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-plus-circle"></i> Tambah Pasien
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