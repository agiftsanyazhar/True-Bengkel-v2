@extends('layouts.dashboard.app')

@section('content')
    {{-- Breadcrumbs --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Master</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">{{ $title }}</h5>
            </div>
            <div class="row g-3 mt-2">
                @foreach ($about as $item)
                    <div class="col-md-6">
                        <label class="form-label"><b>Name</b></label>
                        <input type="text" class="form-control" value="{{ $item->name }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label"><b>Opening Hours</b></label>
                        <input type="text" class="form-control" value="{{ $item->opening_hours }}; {{ $item->closing_hours }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Email</b></label>
                        <input type="email" class="form-control" value="{{ $item->email }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Phone</b></label>
                        <input type="number" class="form-control" value="{{ $item->phone }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Location</b></label>
                        <input type="text" class="form-control" value="{{ $item->location }}" disabled>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Headline</b></label>
                        <textarea class="form-control" rows="5" disabled>{{ $item->headline }}</textarea>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label"><b>About</b></label>
                        <textarea class="form-control" rows="5" disabled>{{ $item->description }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Hero Image</b></label>
                        <div>
                            <img src="{{ '/storage/' . $item->hero_image }}" class="img-dashboard">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>About Image</b></label>
                        <div>
                            <img src="{{ '/storage/' . $item->about_image }}" class="img-dashboard">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Map</b></label>
                        {!! $item->map !!}
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#modalForm"
                            onclick="openFormDialog('modalForm', 'add', {{ json_encode($about) }})"><ion-icon name="pencil-sharp"></ion-icon></button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" id="formModal" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            <label class="form-label"><b>Name<span class="text-danger text-bold">*</span></b></label>
                            <input class="form-control clear-after" type="hidden" name="id" aria-label="default input example">
                            <input type="text" class="form-control clear-after" placeholder="Input Name" name="name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Opening Hours<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control clear-after" placeholder="Input Opening Hours" name="opening_hours" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Closing Hours<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control clear-after" placeholder="Input Closing Hours" name="closing_hours" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Email<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control clear-after" placeholder="Input Email" name="email" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Phone<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control clear-after" placeholder="Input Phone" name="phone" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Location<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control clear-after" placeholder="Input Location" name="location" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Headline<span class="text-danger text-bold">*</span></b></label>
                            <textarea class="form-control clear-after" rows="5" placeholder="Your Headline" name="headline" required></textarea>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label"><b>Map<span class="text-danger text-bold">*</span></b></label>
                            <textarea class="form-control clear-after" rows="5" placeholder="Paste your location by copying the HTML from the embed map on Google Maps" name="map" required></textarea>
                            <a href="https://maps.google.com/" target="_blank"><small class="text-secondary">Open Google Maps <i class="bi bi-box-arrow-up-right"></i></small></a>
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label"><b>Choose Hero Image<span class="text-danger text-bold">*</span></b></label>
                            <input class="form-control clear-after" type="file" id="formFile" name="hero_image" required>
                            <small class="text-danger">
                                <b>- Max. 2 MB</b><br>
                            </small>
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label"><b>Choose About Image<span class="text-danger text-bold">*</span></b></label>
                            <input class="form-control clear-after" type="file" id="formFile" name="about_image" required>
                            <small class="text-danger">
                                <b>- Max. 2 MB</b>
                            </small>
                        </div>

                        <span class="text-danger text-bold"><b>* Required</b></span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="saveForm()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function saveForm() {
            const nameField = document.querySelector('input[name="name"]');
            if (nameField.value.trim() === '') {
                alertDialog(nameField.name);
                return;
            }

            document.getElementById('formModal').submit();
        }

        function openFormDialog(target, type, id, name) {
            if (type === 'edit') {
                const item = data[0];
                $('#' + target + ' .clear-after').val('');
                $('#' + target + ' form').attr('action', '{{ route('admin.master.master-data.tipe-motor.update') }}');
                $('#' + target + ' .clear-after[name="id"]').val(id);
                $('#' + target + ' input[name="name"]').val(name);
                $('#' + target + ' input[name="opening_hours"]').val(opening_hours);
                $('#' + target + ' input[name="closing_hours"]').val(closing_hours);
                $('#' + target + ' input[name="email"]').val(email);
                $('#' + target + ' input[name="phone"]').val(phone);
                $('#' + target + ' input[name="location"]').val(location);
                $('#' + target + ' textarea[name="headline"]').val(headline);
                $('#' + target + ' textarea[name="map"]').val(map);
                $('#' + target + ' input[name="hero_image"]').val(hero_image);
                $('#' + target + ' input[name="about_image"]').val(about_image);
            }
            $('#' + target).modal('toggle');
            $('#' + target).attr('data-operation-type', type);
        }
    </script>
@endsection