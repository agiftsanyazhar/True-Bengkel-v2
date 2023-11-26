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
            <form class="form-body row g-3" action="{{ route('forget-password.submit') }}" method="GET">
              <div class="col-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" required>
              </div>
              <div class="col-12 col-lg-12">
                <div class="d-grid">
                  <button type="button" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection
