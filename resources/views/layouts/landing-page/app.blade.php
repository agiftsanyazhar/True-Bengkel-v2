<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }} | True Bengkel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- Google Fonts --}}
  <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}">
  <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin>
  <link href="{{ url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap') }}" rel="stylesheet">

  {{-- Plugin --}}
  <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css') }}">

  {{-- CSS --}}
  <link href="{{ asset('landing-page/css/main.css') }}" rel="stylesheet">

</head>

<body>

  @include('layouts.landing-page.header')

  <main id="main">
    @yield('container')
  </main>

  @include('layouts.landing-page.footer')

  {{-- Plugin --}}
  <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  {{-- Main JS --}}
  <script src="{{ asset('landing-page/js/main.js') }}"></script>

  <script src="{{ url('https://code.jquery.com/jquery-3.7.0.min.js') }}" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script>
    // Filter Products on Landing Page
    $(document).ready(function() {
      $('.nav-link').on('click', function() {
        $('.nav-link').removeClass('active');

        $(this).addClass('active show');
      });
    });

    // Filter Products
    $(document).ready(function () {
      $(".category-checkbox").change(function () {
        updateFilters();
      });

      function updateFilters() {
        var selectedCategories = [];
        $(".category-checkbox:checked").each(function () {
          selectedCategories.push($(this).val());
        });

        if (selectedCategories.length > 0) {
          $(".products-item").hide();

          selectedCategories.forEach(function (category) {
            $(".category-" + category).show();
          });
        } else {
          $(".products-item").show();
        }
      }
    });
    
    // Filter Position
    $(document).ready(function () {
      $(".position-checkbox").change(function () {
        updateFilters();
      });

      function updateFilters() {
        var selectedPositions = [];
        $(".position-checkbox:checked").each(function () {
          selectedPositions.push($(this).val());
        });

        if (selectedPositions.length > 0) {
          $(".position-item").hide();

          selectedPositions.forEach(function (position) {
            $(".position-" + position).show();
          });
        } else {
          $(".position-item").show();
        }
      }
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Get references to relevant elements
      const qtyInput = document.getElementById('qtyInput');
      const priceElement = document.querySelector('.price');
      const totalElement = document.querySelector('#totalPrice'); // Add an id to the element displaying total price
      const minusButton = document.querySelector('[data-type="minus"]');
      const plusButton = document.querySelector('[data-type="plus"]');

      // Initial total calculation
      updateTotal();

      // Add event listeners
      qtyInput.addEventListener('input', updateTotal);
      minusButton.addEventListener('click', decreaseQuantity);
      plusButton.addEventListener('click', increaseQuantity);

      function updateTotal() {
        // Get quantity and price values
        const qty = parseInt(qtyInput.value);
        const price = parseFloat(priceElement.innerText.replace('Rp ', '').replace('.', '')); // Parse the price

        // Calculate total
        const total = qty * price;

        // Update total display
        totalElement.innerText = `Rp ${numberWithCommas(total)}`;
      }

      function decreaseQuantity() {
        qtyInput.value = Math.max(parseInt(qtyInput.value), 1);
        updateTotal();
      }

      function increaseQuantity() {
        qtyInput.value = parseInt(qtyInput.value);
        updateTotal();
      }

      // Function to add commas to the total
      function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
    });
  </script>

</body>

</html>