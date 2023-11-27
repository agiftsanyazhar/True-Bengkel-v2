@extends('layouts.landing-page.app')

@section('container')
  {{-- Products Section --}}
  <section id="products" class="products mt-5 mb-5">
    <div class="container">
      <div class="section-title">
        <p>{{ $title }}</p>
      </div>

      <div class="row gy-5">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5>Filter</h5>

              <div class="my-3">
                <h6>Category</h6>
                @php
                  $displayedSlugs = [];
                @endphp

                @foreach ($sparePart as $key => $item)
                  @php
                    $slug = $item->slug;
                  @endphp

                  @unless(in_array($slug, $displayedSlugs))
                    <div class="form-check">
                      <input class="form-check-input category-checkbox" type="checkbox" value="{{ $slug }}" id="{{ $slug }}">
                      <label class="form-check-label" for="{{ $slug }}">
                        {{ $item->brand->name }}
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
          <div class="row gy-5" id="filtered-products">
            @foreach ($sparePart as $item)
              <div class="col-md-4 products-item category-{{ $item->slug }}">
                <a href="{{ route('landing-page.products.detail', ['id' => $item->id]) }}">
                  <div class="card">
                    <img src="{{ 'storage/' . $item->image }}" class="card-img-top">
                    <div class="card-body">
                      <h4>{{ Str::limit($item->name, 22) }}</h4>
                      <p class="description">{{ $item->headline }}</p>
                      <p class="price">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                    </div>
                  </div>
                </a>
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