@extends('layouts.auth.app')

@section('container')

  <div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-6 col-md-7 mx-auto mt-5">
        <div class="card">
          <div class="card-body p-4">
            <div class="text-center">
              <h4>{{ $title }}</h4>
            </div>

            @if ($errors->any() || session()->has('alert'))
              <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{ $errors->first() ?? session('alert') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session('success'))
              <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @elseif(session('warning'))
              <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @elseif(session('danger'))
              <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{ session('danger') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <form class="form-body row g-3" action="{{ route('register') }}" method="GET">
              <div class="col-12">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" required>
              </div>
              <div class="col-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" required>
              </div>
              <div class="col-12">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" required>
              </div>
              <div class="col-12 col-lg-12">
                <div class="d-grid">
                  <button type="button" class="btn btn-primary">{{ $title }}</button>
                </div>
              </div>
              <div class="col-12 col-lg-12 text-center">
                <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection
