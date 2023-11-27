@extends('layouts.dashboard.app')

@section('content')
    {{-- Breadcrumbs --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Master</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Master Data</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">{{ $title }} <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalForm"
                                    onclick="openFormDialog('modalForm', 'add')"><ion-icon name="add-sharp"></ion-icon></button></h5>
            </div>
            <div class="table-responsive mt-4">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php($number=1)
                            @foreach ($brand as $item)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                                        data-bs-target="#modalForm"
                                                        onclick="openFormDialog('modalForm', 'edit', '')"><ion-icon name="pencil-sharp"></ion-icon></button>
                                            <button type="button" class="btn btn-danger" onclick="deleteDialog('')"><ion-icon name="trash-sharp"></ion-icon></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php($number++)
                            @endforeach
                        </tr>
                    </tbody>
                </table>
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
                    <form class="row g-3" id="formModal" action="{{ route('admin.master.master-data.brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label"><b>Name<span class="text-danger text-bold">*</span></b></label>
                            <input class="form-control clear-after" type="hidden" name="id" aria-label="default input example">
                            <input type="text" class="form-control" placeholder="Input Brand Name" name="name" required>
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