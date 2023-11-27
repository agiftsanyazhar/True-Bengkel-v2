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
                            <th>Spare Part Code</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Tipe Motor</th>
                            <th>Headline</th>
                            <th>Description</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($number=1)
                        @foreach ($sparePart as $item)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $item->spare_part_code }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="product-box border">
                                            <img src="{{ url('/storage/' . $item->image) }}" alt="">
                                        </div>
                                        <div class="product-info">
                                            <h6 class="product-name mb-1">{{ Str::limit($item->name, 20) }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->brand->name }}</td>
                                <td>{{ $item->tipe_motor->name }}</td>
                                <td>{{ Str::limit($item->headline, 50) }}</td>
                                <td>{{ Str::limit($item->description, 50) }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                                data-bs-target="#modalForm"
                                                onclick="openFormDialog('modalForm', 'edit', '{{ $item->id }}', '{{ $item->spare_part_code }}', '{{ $item->image }}', '{{ $item->name }}', '{{ $item->brand_id }}', '{{ $item->tipe_motor_id }}', '{{ $item->headline }}', '{{ $item->description }}', '{{ $item->stock }}', '{{ $item->price }}')"><ion-icon name="pencil-sharp"></ion-icon></button>
                                            <button type="button" class="btn btn-danger" onclick="deleteDialog('{{ route('admin.spare-part.destroy', $item->id) }}')"><ion-icon name="trash-sharp"></ion-icon></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php($number++)
                            @endforeach
                        <tr>
                            <td>10</td>
                            <td>abc</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="product-box border">
                                        <img src="{{ url('/storage/uploads/spare-part/logo-unair.png') }}" alt="">
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-name mb-1">Agiftsany Azhar</h6>
                                    </div>
                                </div>
                            </td>
                            <td>Ducati</td>
                            <td>Sport Bike</td>
                            <td>abc</td>
                            <td>def</td>
                            <td>123</td>
                            <td>456</td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                            data-bs-target="#modalForm"
                                            onclick="openFormDialog('modalForm', 'edit', '{{ $item->id }}', '{{ $item->spare_part_code }}', '{{ $item->image }}', '{{ $item->name }}', '{{ $item->brand_id }}', '{{ $item->tipe_motor_id }}', '{{ $item->headline }}', '{{ $item->description }}', '{{ $item->stock }}', '{{ $item->price }}')"><ion-icon name="pencil-sharp"></ion-icon></button>
                                        <button type="button" class="btn btn-danger" onclick="deleteDialog('{{ route('admin.spare-part.destroy', $item->id) }}')"><ion-icon name="trash-sharp"></ion-icon></button>
                                    </div>
                                </div>
                            </td>
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
                    <form class="row g-3" id="formModal" action="{{ route('admin.spare-part.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label class="form-label"><b>Spare Part Code<span class="text-danger text-bold">*</span></b></label>
                            <input class="form-control clear-after" type="hidden" name="id" aria-label="default input example">
                            <input type="text" class="form-control" placeholder="Input Spare Part Code" name="spare_part_code" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><b>Name<span class="text-danger text-bold">*</span></b></label>
                            <input type="text" class="form-control" placeholder="Input Name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><b>Brand<span class="text-danger text-bold">*</span></b></label>
                            <select class="form-select mb-3" aria-label="Default select example" name="brand_id" required>
                                <option value="" disabled selected hidden>Choose Brand</option>
                                @foreach($listBrand as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><b>Tipe Motor<span class="text-danger text-bold">*</span></b></label>
                            <select class="form-select mb-3" aria-label="Default select example" name="tipe_motor_id" required>
                                <option value="" disabled selected hidden>Choose Brand</option>
                                @foreach($listTipeMotor as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><b>Headline<span class="text-danger text-bold">*</span></b></label>
                            <textarea class="form-control clear-after" rows="5" placeholder="Headline" name="headline" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><b>Description<span class="text-danger text-bold">*</span></b></label>
                            <textarea class="form-control clear-after" rows="5" placeholder="Description" name="headline" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><b>Stock<span class="text-danger text-bold">*</span></b></label>
                            <input type="number" class="form-control" placeholder="Input Stock" name="stock" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"><b>Price<span class="text-danger text-bold">*</span></b></label>
                            <input type="number" class="form-control" placeholder="Input Price" name="price" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><b>Image</b></label>
                            <input class="form-control clear-after" type="file" id="formFile" name="image">
                            <small class="text-danger">
                                <b>- Max. 2 MB</b>
                            </small>

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

        function openFormDialog(target, type, id, spare_part_code, image, name, brand_id, tipe_motor_id, headline, description, stock, price) {
            if (type === 'add') {
                $('#' + target + ' form').attr('action', '{{ route('admin.spare-part.store') }}');
                $('#' + target + ' .form-control').val('');
                $('#' + target + ' input[name="spare_part_code"]').attr('required', 'required');
                $('#' + target + ' input[name="name"]').attr('required', 'required');
                $('#' + target + ' select[name="brand_id"]').attr('required', 'required');
                $('#' + target + ' select[name="tipe_motor_id"]').attr('required', 'required');
                $('#' + target + ' textarea[name="headline"]').attr('required', 'required');
                $('#' + target + ' textarea[name="description"]').attr('required', 'required');
                $('#' + target + ' input[name="stock"]').attr('required', 'required');
                $('#' + target + ' input[name="price"]').attr('required', 'required');
            } else if (type === 'edit') {
                $('#' + target + ' .clear-after').val('');
                $('#' + target + ' form').attr('action', '{{ route('admin.spare-part.update') }}');
                $('#' + target + ' .clear-after[name="id"]').val(id);
                $('#' + target + ' input[name="spare_part_code"]').val(spare_part_code);
                $('#' + target + ' input[name="name"]').val(name);
                $('#' + target + ' select[name="brand_id"]').val(brand_id);
                $('#' + target + ' select[name="tipe_motor_id"]').val(tipe_motor_id);
                $('#' + target + ' textarea[name="headline"]').val(headline);
                $('#' + target + ' textarea[name="description"]').val(description);
                $('#' + target + ' input[name="stock"]').val(stock);
                $('#' + target + ' input[name="price"]').val(price);
            }
            $('#' + target).modal('toggle');
            $('#' + target).attr('data-operation-type', type);
        }
    </script>
@endsection