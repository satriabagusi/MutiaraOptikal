@extends('templates.index')
@section('title', 'Mutiara Optik - Add Employee')
@section('tambah-frame', 'active')

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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tambah Data Frame</h1>
        </div>

        

        <!-- Content Row -->
        <div class="row justify-content-center">

          <div class="col-6">
            <div class="card shadow-sm mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Merk Frame </h6>
              </div>
              <div class="card-body px-5">
            <h4>Tambah Jenis Frame</h4>
            <hr>
          <form action="{{route('add-type')}}" method="POST" class="mb-5">
            @csrf
            <div class="form-group">
              <label for="id_brand">Merk Frame </label>
                  <select class="form-control selectpicker border pb-2" data-live-search="true" name="id_brand">
                  @foreach ($brands as $brand)
                  <option data-brand="{{$brand->id}}" value="{{$brand->id}}">{{$brand->frame_brand}}</option>
                  @endforeach
                  </select>
                  <small>*Jika merk tidak ada Tambahkan terlebih dahulu</small>
              </div>

              <div class="form-group">
                <label for="frame_type">Kode/Tipe Frame</label>
                <input type="text" class="form-control @error('frame_type') is-invalid @enderror" placeholder="Kode/Tipe Frame" name="frame_type" autocomplete="off" value={{old('frame_type')}}>
                @error('frame_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="stock">Stock Tipe Frame</label>
                <input type="text" class="form-control @error('stock') is-invalid @enderror" placeholder="Stock Tipe Frame" name="stock" id="stock" autocomplete="off"  value={{old('stock')}}>
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <label for="price">Harga Tipe Frame</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rp. </span>
                </div>
                <input type="text" placeholder="Harga Tipe Frame" class="form-control @error('price') is-invalid @enderror" name="price" id="price"  autocomplete="off" value={{old('price')}}>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

              <div class="row justify-content-end">
                <button href="#" class="btn btn-success shadow-sm"><i class="fas fa-plus-circle"></i> Tambah Tipe Frame
                </button>
              </div>
          </form>
              </div>
            </div>
        </div>


        <div class="col-6">
          <div class="card shadow-sm mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Merk Frame </h6>
            </div>
            <div class="card-body px-5">
          <h4>Tambah Merk</h4>
          <hr>

          
        <form action="{{route('add-brand')}}" method="POST" class="mb-5">
          @csrf
            <div class="form-group">
              <label for="brand">Merk Frame</label>
              <input type="text" class="form-control @error('brand') is-invalid @enderror" placeholder="Merk Frame" name="brand" autocomplete="off" value={{old('brand')}} >
              @error('brand')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="row justify-content-end">
              <button href="#" class="btn btn-success shadow-sm mr-2"><i class="fas fa-plus-circle"></i> Tambah Merk Frame
              </button>
            </div>
        </form>

        </div>
        </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection