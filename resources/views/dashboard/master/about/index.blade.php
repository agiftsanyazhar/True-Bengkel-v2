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
                <div class="col-md-6">
                    <label class="form-label"><b>Name</b></label>
                    <input type="text" class="form-control" value="" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label"><b>Opening Hours</b></label>
                    <input type="text" class="form-control" value="" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label"><b>Email</b></label>
                    <input type="email" class="form-control" value="" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label"><b>Phone</b></label>
                    <input type="number" class="form-control" value="" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label"><b>Location</b></label>
                    <input type="text" class="form-control" value="" disabled>
                </div>
                <div class="col-md-4">
                    <label class="form-label"><b>Headline</b></label>
                    <textarea class="form-control" rows="5" disabled></textarea>
                </div>
                <div class="col-md-8">
                    <label class="form-label"><b>About</b></label>
                    <textarea class="form-control" rows="5" disabled></textarea>
                </div>
                <div class="col-md-4">
                    <label class="form-label"><b>Hero Image</b></label>
                    <img src="{{ asset('landing-page/img/pexels-lisa-fotios-115558.jpg') }}" class="img-dashboard">
                </div>
                <div class="col-md-4">
                    <label class="form-label"><b>About Image</b></label>
                    <img src="{{ asset('landing-page/img/pexels-lisa-fotios-115558.jpg') }}" class="img-dashboard">
                </div>
                <div class="col-md-4">
                    <label class="form-label"><b>Map</b></label>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16673.13208541504!2d112.7937557!3d-7.275847100000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa10ea2ae883%3A0xbe22c55d60ef09c7!2sPoliteknik%20Elektronika%20Negeri%20Surabaya!5e1!3m2!1sid!2sus!4v1696674447535!5m2!1sid!2sus" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-12">
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#modalForm"
                        onclick="openFormDialog('modalForm', 'add')"><ion-icon name="pencil-sharp"></ion-icon></button>
                </div>
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
                            <input type="text" class="form-control" placeholder="Input Brand Name" name="name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Opening Hours<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control" placeholder="Input Opening Hours" name="opening_hours" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Closing Hours<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control" placeholder="Input Closing Hours" name="closing_hours" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Email<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control" placeholder="Input Email" name="email" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Phone<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control" placeholder="Input Phone" name="phone" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Location<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control" placeholder="Input Location" name="location" required>
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
                            <input class="form-control" type="file" id="formFile" name="hero_image">
                            <small class="text-danger">
                                <b>- Max. 2 MB</b><br>
                            </small>
                        </div>
                        <div class="col-md-6">
                            <label for="formFile" class="form-label"><b>Choose About Image<span class="text-danger text-bold">*</span></b></label>
                            <input class="form-control" type="file" id="formFile" name="about_image">
                            <small class="text-danger">
                                <b>- Max. 2 MB</b><br>
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
@endsection