@extends('layouts.dashboard.app')

@section('content')
    {{-- Breadcrumbs --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Database</li>
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
            <div class="table-responsive mt-4">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pelanggan</th>
                            <th>STNK</th>
                            <th>Brand / Tipe Motor</th>
                            <th>No Mesin</th>
                            <th>No Rangka</th>
                            <th>Tahun / Warna</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($number=1)
                        @foreach ($kendaraan as $item)
                            <tr>
                                <td>{{ $number }}</td>
                                <td>{{ $item->pelanggan->name }}</td>
                                <td>{{ $item->stnk }}</td>
                                <td>{{ $item->brand->name }} / {{ $item->tipe_motor->name }}</td>
                                <td>{{ $item->no_mesin }}</td>
                                <td>{{ $item->no_rangka }}</td>
                                <td>{{ $item->tahun }} {{ $item->warna }}</td>
                            </tr>
                        @php($number++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection