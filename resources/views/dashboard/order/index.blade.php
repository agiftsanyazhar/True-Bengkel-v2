@extends('layouts.dashboard.app')

@section('content')
    {{-- Breadcrumbs --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)"></a>Orders</li>
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
                            <th>Order Code</th>
                            <th>Total Shopping</th>
                            <th>Status</th>
                            <th>Bukti Pembayaran</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($number=1)
                        @foreach ($order as $item)
                        <tr>
                            <td>{{ $number }}</td>
                            <td>{{ $item->order_code }}</td>
                            <td>Rp {{ number_format($item->total_shopping, 0, ',', '.') }}</td>
                            <td>{{ date('Y-m-d H:i:s', strtotime($item->created_at)) }} {!! $item->is_paid  == 1 ? '<span class="badge rounded-pill alert-success">Paid</span>' : '<span class="badge rounded-pill alert-danger">Unpaid</span>'  !!}</td>
                            <td><a href="{{ url('/storage/' . $item->bukti_pembayaran) }}" target="_blank" rel="noopener noreferrer">Download</a></td>
                            <td>
                                <div class="d-flex align-items-center gap-3 fs-6">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.order.order.detail', $item->id) }}" class="btn btn-primary"><ion-icon name="eye-sharp"></ion-icon></a>
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
@endsection