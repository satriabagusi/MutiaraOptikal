@extends('templates.index')
@section('title', 'Mutiara Optik - Add Employee')
@section('tambah-pegawai', 'active')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      @if (Session::has('status'))
      <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">
                {{ Session::get('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tambah Pegawai</h1>
          
        </div>

        <!-- Content Row -->
        <div class="row justify-content-center">
          <div class="col">

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pegawai </h6>
              </div>
              <div class="card-body px-5">
            
          <form action="{{route('add-employee')}}" method="POST" class="mb-5">
            @csrf
              <div class="form-group">
                <label for="name">Nama Pegawai</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" placeholder="First Last Name" name="name" autocomplete="off" value={{old('name')}} >
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" autocomplete="off" value={{old('username')}}>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="1234" disabled>
                <small>*Default Password is <b>1234</b>, Please Change after created User for Employee</small>
              </div>
              <div class="row justify-content-end">
                <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-plus-circle"></i> Add User
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