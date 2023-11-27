@extends('layouts.landing-page.app')

@section('container')
  {{-- Gallery Section --}}
  <section id="gallery" class="gallery mt-5 mb-5">
    <div class="container" >

      <div class="section-title">
        <p>{{ $title }}</p>
      </div>

      <div class="row gy-5">

        @foreach ($gallery as $item)
          <div class="col-md-3 products-item">
            <div class="card">
              <img src="{{ 'storage/' . $item->image }}" class="card-img-top">
              <div class="card-body text-center">
                <h4>{{ $item->name }}</h4>
              </div>
            </div>
          </div>
        @endforeach

      </div>

      <div class="mt-5 text-center">
        <a class="btn" href="javasript:void(0)" role="button">Load More <i class="bi bi-chevron-double-down"></i></a>
      </div>

    </div>
  </section>
@endsection