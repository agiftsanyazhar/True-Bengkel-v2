@extends('layouts.dashboard.app')

@section('content')
    {{-- Breadcrumbs --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Orders</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Order Detail</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $orderCode }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Order Detail</h5>
            </div>
            <div class="table-responsive mt-4">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Spare Part</th>
                            <th>Qty</th>
                            <th>Harga Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($number=1)
                        @foreach ($orderDetail as $item)
                        <tr>
                            <td>{{ $number }}</td>
                            <td>{{ $item->spare_part->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        </tr>
                        @php($number++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Service Detail</h5>
            </div>
            <div class="table-responsive mt-4">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Harga Jasa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($number=1)
                        @foreach ($serviceDetail as $item)
                        <tr>
                            <td>{{ $number }}</td>
                            <td>{{ $item->name }}</td>
                            <td>Rp {{ number_format($item->harga_jasa, 0, ',', '.') }}</td>
                        </tr>
                        @php($number++)
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection