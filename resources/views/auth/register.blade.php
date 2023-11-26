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
