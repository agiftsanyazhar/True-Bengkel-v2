@extends('layouts.landing-page.app')

@section('container')
  {{-- Hero Section --}}
  <section id="hero" class="hero d-flex align-items-center" style="background-image: url('{{ 'storage/' . $about->hero_image }}');">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-md-12 d-flex flex-column justify-content-center align-items-center text-center">
          <h2>Welcome to {{ $about->name }}</h2>
          <p>{{ $about->headline }}</p>
          <div class="d-flex">
            <a href="{{ url()->route('landing-page.index') . '#about' }}" class="btn-login">Get Started</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  {{-- About Section --}}
  <section id="about" class="about">
    <div class="container" >

      <div class="section-title">
        <p>About</p>
      </div>

      <div class="row gy-5">
        <div class="col-md-5 about-img" style="background-image: url({{ 'storage/' . $about->about_image }});">
        </div>
        <div class="col-md-7 d-flex align-items-center">
          <div class="content ps-0 ps-md-5">
            {!! $about->description !!}
          </div>
        </div>
      </div>

    </div>
  </section>

  {{-- Products Section --}}
  <section class="products">
    <div class="container" >

      <div class="section-title">
        <p>Products</p>
      </div>

      <ul class="nav nav-tabs d-flex justify-content-center">

        <div class="slider">

          @php
            $displayedSlugs = [];
          @endphp

          @foreach ($sparePart as $key => $item)
            @php
              $slug = $item->slug;
            @endphp

            @unless(in_array($slug, $displayedSlugs))
              <li class="nav-item">
                <a class="nav-link @if ($key === 0) active show @endif" data-bs-toggle="tab" data-bs-target="#{{ $item->slug }}">
                  <h4>{{ $item->brand->name }}</h4>
                </a>
              </li>

              @php
                $displayedSlugs[] = $slug;
              @endphp
            @endunless
          @endforeach

        </div>

      </ul>

      <div class="tab-content">
        @php
          $displayedSlugs = [];
        @endphp

        @foreach ($sparePart as $key => $item)
          @php
            $slug = $item->slug;
          @endphp

          @unless(in_array($slug, $displayedSlugs))
            <div class="tab-pane fade @if ($key === 0) active show @endif" id="{{ $item->slug }}">
              <div class="row gy-5">
                @foreach ($sparePart as $subItem)
                  @if ($subItem->slug === $slug)
                    <div class="col-md-3 products-item">
                      <a href="{{ route('landing-page.products.detail', ['id' => $subItem->id]) }}">
                        <div class="card">
                          <img src="{{ 'storage/' . $subItem->image }}" class="card-img-top">
                          <div class="card-body">
                            <h4>{{ Str::limit($subItem->name, 20) }}</h4>
                            <p class="description">{{ $subItem->headline }}</p>
                            <p class="price">Rp {{ number_format($subItem->price, 0, ',', '.') }}</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
            @php
                $displayedSlugs[] = $slug;
            @endphp
          @endunless
        @endforeach
      </div>

      <div class="mt-5 text-end">
        <a class="btn" href="{{ route('landing-page.products.index') }}" role="button">See All <i class="bi bi-chevron-double-right"></i></a>
      </div>

    </div>
  </section>

  {{-- Customer Service Section --}}
  <section class="customer-service">
    <div class="container" >

      <div class="section-title">
        <p>Customer Service</p>
      </div>

      <div class="row gy-5">

        @foreach ($pegawai as $item)
          <div class="col-md-4 d-flex">
            <div class="customer-service-employee">
              <div class="employee-img">
                <img src="{{  $item->image ? 'storage/' . $item->image : asset('landing-page/img/unnamed.jpg') }}" style="{{ !$item->image ? 'object-fit: contain;' : '' }}" class="img-fluid" alt="">
              </div>
              <div class="employee-info">
                <h4>{{ $item->name }}</h4>
                <span>{{ $item->jabatan->name }}</span>
                <p>{{ $item->description }}</p>
              </div>
            </div>
          </div>
        @endforeach

      </div>

      <div class="mt-5 text-end">
        <a class="btn" href="{{ route('landing-page.customer-service') }}" role="button">See All <i class="bi bi-chevron-double-right"></i></a>
      </div>

    </div>
  </section>

  {{-- Gallery Section --}}
  <section class="gallery">
    <div class="container" >

      <div class="section-title">
        <p>Gallery</p>
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

      <div class="mt-5 text-end">
        <a class="btn" href="{{ route('landing-page.gallery') }}" role="button">See All <i class="bi bi-chevron-double-right"></i></a>
      </div>

    </div>
  </section>

  {{-- Contact Section --}}
  <section class="contact">
    <div class="container">

      <div class="section-title">
        <p>Contact</p>
      </div>

      <div class="row gy-5">

        <div class="col-md-5 d-flex align-items-stretch">
          <div class="info">
            <a href="javascript:void(0)">
              <div class="social-contact">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{ $about->location }}</p>
              </div>
            </a>

            <a href="javascript:void(0)">
              <div class="social-contact">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $about->email }}</p>
              </div>
            </a>

            <a href="javascript:void(0)">
              <div class="social-contact">
                <i class="bi bi-telephone"></i>
                <h4>Call Us:</h4>
                <p>{{ $about->phone }}</p>
              </div>
            </a>

            <a href="javascript:void(0)">
              <div class="social-contact">
                <i class="bi bi-clock"></i>
                <h4>Opening Hours:</h4>
                <p>{{ $about->opening_hours }}; {{ $about->closing_hours }}</p>
              </div>
            </a>
            
          </div>
          
        </div>
        
        <div class="col-md-7 mt-5 d-flex align-items-stretch">
          <div class="info">
            {!! $about->map !!}
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection