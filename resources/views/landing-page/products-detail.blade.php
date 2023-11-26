@extends('layouts.landing-page.app')

@section('container')
  {{-- Products Section --}}
  <section id="products" class="products mt-5 mb-5">
    <div class="container" >

      <div class="section-title">
        <p>{{ $title }}</p>
      </div>

      <div class="row gy-5">

        <div class="col-md-8 tab-content">

          <div class="products-item">
            <div class="card">
              <img src="{{ '/storage/' . $sparePart->image }}" style="height: 350px; object-fit: contain;" class="card-img-top">
              <div class="card-body">
                <h4>{{ $sparePart->name }}</h4>
                <h3 class="price">Rp {{ number_format($sparePart->price, 0, ',', '.') }}</h3>
                <hr>
                <p>{{ $sparePart->description }}</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5>Atur Jumlah</h5>

              <div class="my-3">
                <div class="input-group">
                  <button class="btn btn-number" type="button" data-type="minus" data-field="qty"><i class="bi bi-dash-lg"></i></button>
                  <input type="number" class="form-control input-number text-center" min="1" max="100" value="1" name="qty" id="qtyInput">
                  <button class="btn btn-number" type="button" data-type="plus" data-field="qty"><i class="bi bi-plus-lg"></i></button>
                </div>
                <small>Stock: {{ $sparePart->stock }}</small>
              </div>

              <hr>
              
              <div class="row">
                <div class="col-md-12 d-flex justify-content-between">
                  <h6>Total</h6>
                  <h4 id="totalPrice"></h4>
                </div>
              </div>
              
              <div class="my-3">
                <div class="row">
                  <div class="col-md-12 d-flex justify-content-center">
                    <a class="btn ms-2 me-2" href="javasript:void(0)" role="button"><i class="bi bi-cart-plus"></i> Cart</a>
                    <a class="btn ms-2 me-2" href="javasript:void(0)" role="button"><i class="bi bi-currency-dollar"></i> Buy</a>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection