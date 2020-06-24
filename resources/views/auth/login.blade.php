@extends('templates.auth')
@section('title', 'Mutiara Optik Login');

@section('container')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
              <img src="{{url('img/login.svg')}}" alt="" width="350" class="mx-5 my-5">
              </div>
              <div class="col-lg-6 my-5">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                <form class="user" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"  name="username"  placeholder="Username" value="{{old('name')}}" required>
                          @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                          @enderror 
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user @error('username') is-invalid @enderror" name="password" placeholder="Password" reuired>
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                          @enderror 
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  @if (Session::has('error'))
                  <div class="alert {{ Session::get('alert-class', 'alert-danger') }} alert-dismissible fade show" role="alert">
                            {{ Session::get('error') }}
                  </div>
                  @endif

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
    
@endsection