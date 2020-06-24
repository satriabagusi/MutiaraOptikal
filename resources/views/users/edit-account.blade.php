@extends('templates.index')
@section('title', 'Mutiara Optik - Add Employee')
@section('my-account', 'active')

@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Edit Akun  </h1>
          
        </div>

        <!-- Content Row -->
        <div class="row justify-content-end">
            <div class="col-3">
            <img src="{{url('img/avatar.png')}}" width="250">
            </div>
          <div class="col-5">

            
          <form action="{{route('edit-account')}}" method="POST" class="mb-5">
            @csrf
              <div class="form-group">
                <label for="name">Nama Pegawai</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" placeholder="First Last Name" name="name" autocomplete="off" value="{{Auth::user()->name}}" >
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" autocomplete="off" value="{{Auth::user()->username}}">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="{{Auth::user()->password}}">
                
              </div>
              <div class="row justify-content-end">
                <a href="/account/" class="btn btn-danger shadow-sm mr-4"><i class="fas fa-pen"></i> Cancel
                </a>
                <button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-pen"></i> Edit User
                </button>
              </div>
            </form>
        </div>
        <div class="col-2">
                
        </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection