@extends('layouts.auth.app')

@section('container')

  <div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-6 col-md-7 mx-auto mt-5">
        <div class="card">
          <div class="card-body p-4">
            <div class="text-center">
              <div class="class mb-4">
                <h4 class="logo-text">{{ $title }}</h4>
              </div>
            </div>

            @if ($errors->any() || session()->has('alert'))
              <div class="alert alert-dismissible fade show py-2 bg-danger">
                <div class="d-flex align-items-center">
                  <div class="fs-3 text-white"><ion-icon name="close-circle-sharp"></ion-icon>
                  </div>
                  <div class="ms-3">
                    <div class="text-white">
                      @if ($errors->any())
                        {{ $errors->first() }}
                      @else
                        {{ session('alert') }}
                      @endif
                    </div>
                  </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <form class="form-body row g-3" action="{{ route('reset-password.submit') }}" method="GET">
              @csrf
              <div class="col-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="hidden" name="token" class="form-control" value="{{ $token }}">
                <input type="email" class="form-control" id="inputEmail" name="email" required>
              </div>
              <div class="col-12">
                <label for="inputPassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="inputPassword" name="newpassword" required>
              </div>
              <div class="col-12">
                <label for="renewpassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="renewpassword" name="renewpassword" required>
              </div>
              <div class="col-12 col-lg-12">
                <div class="d-grid">
                  <button type="button" class="btn btn-primary">{{ $title }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection
