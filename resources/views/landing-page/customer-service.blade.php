@extends('layouts.landing-page.app')

@section('container')
  {{-- Customer Service Section --}}
  <section id="customer-service" class="customer-service mt-5 mb-5">
    <div class="container" >

      <div class="section-title">
        <p>{{ $title }}</p>
      </div>

      <div class="row gy-5">

        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5>Filter</h5>

              <div class="my-3">
                <h6>Position</h6>
                @php
                  $displayedSlugs = [];
                @endphp

                @foreach ($pegawai as $key => $item)
                  @php
                    $slug = $item->slug;
                  @endphp

                  @unless(in_array($slug, $displayedSlugs))
                    <div class="form-check">
                      <input class="form-check-input position-checkbox" type="checkbox" value="{{ $slug }}" id="{{ $slug }}">
                      <label class="form-check-label" for="{{ $slug }}">
                        {{ $item->jabatan->name }}
                      </label>
                    </div>

                    @php
                      $displayedSlugs[] = $slug;
                    @endphp
                  @endunless
                @endforeach
              </div>
              
            </div>
          </div>
        </div>

        <div class="col-md-9 tab-content">

          <div class="row gy-5" id="filtered-position">

            @foreach ($pegawai as $item)
              <div class="col-md-4 position-item position-{{ $item->slug }}">
                <div class="customer-service-employee">
                  <div class="employee-img">
                    <img src="{{  $item->image ? '/storage/' . $item->image : asset('landing-page/img/unnamed.jpg') }}" style="{{ !$item->image ? 'object-fit: contain;' : '' }}" class="img-fluid" alt="">
                  </div>
                  <div class="employee-info">
                    <h4>{{ $item->name }}</h4>
                    <span>{{ $item->jabatan->name }}</span>
                    <p>{{ $item->description }}</p>
                  </div>
                </div>
              </div>
            @endforeach

            <div class="mt-5 text-center">
              <a class="btn" href="javasript:void(0)" role="button">Load More <i class="bi bi-chevron-double-down"></i></a>
            </div>

          </div>

        </div>

      </div>

    </div>
  </section>
@endsection