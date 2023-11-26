<!doctype html>
<html lang="en" class="light-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- CSS Files --}}
  <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/css/bootstrap-extended.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/css/icons.css') }}" rel="stylesheet">

  {{-- Google Fonts --}}
  <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}">
  <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin>
  <link href="{{ url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap') }}" rel="stylesheet">

  <title>{{ $title }} | True Bengkel</title>
</head>

<body>

  <div class="wrapper">

    @if (session('success'))
        <div class="alert alert-dismissible fade show py-2 bg-success">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp"></ion-icon>
                </div>
                <div class="ms-3">
                    <div class="text-white">{{ session('success') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('warning'))
        <div class="alert alert-dismissible fade show py-2 bg-warning">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-warning"><ion-icon name="warning-sharp"></ion-icon>
                </div>
                <div class="ms-3">
                    <div class="text-warning">{{ session('warning') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session('danger'))
        <div class="alert alert-dismissible fade show py-2 bg-danger">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-white"><ion-icon name="close-circle-sharp"></ion-icon>
                </div>
                <div class="ms-3">
                    <div class="text-white">{{ session('danger') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('container')
    
    @include('layouts.auth.footer')

  </div>

</body>

</html>