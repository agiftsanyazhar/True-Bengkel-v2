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
                        @php($number=1)
                        @foreach ($tipeMotor as $item)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                                data-bs-target="#modalForm"
                                                onclick="openFormDialog('modalForm', 'edit', '{{ $item->id }}', '{{ $item->name }}')"><ion-icon name="pencil-sharp"></ion-icon></button>
                                            <button type="button" class="btn btn-danger" onclick="deleteDialog('{{ route('admin.master.master-data.tipe-motor.destroy', $item->id) }}')"><ion-icon name="trash-sharp"></ion-icon></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @php($number++)
                        @endforeach
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
                    <form class="row g-3" id="formModal" action="{{ route('admin.master.master-data.tipe-motor.store') }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label"><b>Name<span class="text-danger text-bold">*</span></b></label>
                            <input class="form-control clear-after" type="hidden" name="id" aria-label="default input example">
                            <input type="text" class="form-control" placeholder="Input Tipe Motor Name" name="name" required>
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
            if (type === 'add') {
                $('#' + target + ' form').attr('action', '{{ route('admin.master.master-data.tipe-motor.store') }}');
                $('#' + target + ' .form-control').val('');
                $('#' + target + ' input[name="name"]').attr('required', 'required');
            } else if (type === 'edit') {
                $('#' + target + ' .clear-after').val('');
                $('#' + target + ' form').attr('action', '{{ route('admin.master.master-data.tipe-motor.update') }}');
                $('#' + target + ' .clear-after[name="id"]').val(id);
                $('#' + target + ' input[name="name"]').val(name);
            }
            $('#' + target).modal('toggle');
            $('#' + target).attr('data-operation-type', type);
        }
    </script>
@endsection