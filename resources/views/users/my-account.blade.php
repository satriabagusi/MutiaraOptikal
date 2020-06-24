@extends('templates.index')
@section('title', 'Mutiara Optik - Add Employee')
@section('my-account', 'active')

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
          <h1 class="h3 mb-0 text-gray-800">Akun Saya </h1>
          
        </div>

        <!-- Content Row -->
        <div class="row justify-content-end">
            <div class="col-3">
            <img src="{{url('img/avatar.png')}}" width="250">
            </div>
          <div class="col-5">

            
          <form class="mb-5">
            <div class="row justify-content-end">
                <a href="/account/edit" class="btn btn-info shadow-sm"><i class="fas fa-pen"></i> Edit Akun
                </a>
              </div>
              <div class="form-group">
                <label for="name">Nama Pegawai</label>
                <input type="text" class="form-control" disabled value={{Auth::user()->name}} >
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" disabled value={{Auth::user()->username}} disbaled>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" disabled value={{Auth::user()->name}} disbaled>
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