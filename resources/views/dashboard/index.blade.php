@extends('layouts.dashboard.app')

@section('content')
    {{-- Breadcrumbs --}}
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xxl-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="widget-icon-2">
                            <ion-icon name="bag-handle-sharp"></ion-icon>
                        </div>
                    </div>
                    <h5 class="my-3">Total Income</h5>
                    <p class="mb-0 mt-2">$48,256<span class="float-end text-danger">-2.8%</span></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="widget-icon-2">
                            <ion-icon name="card-sharp"></ion-icon>
                        </div>
                    </div>
                    <h5 class="my-3">Total Orders</h5>
                    <p class="mb-0 mt-2">98,246<span class="float-end text-success">+5.9%</span></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="widget-icon-2">
                            <ion-icon name="wallet-sharp"></ion-icon>
                        </div>
                    </div>
                    <h5 class="my-3">Total Users</h5>
                    <p class="mb-0 mt-2">58,653<span class="float-end text-success">+5.9%</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Recent Orders <a href="{{ route('admin.order.index') }}" class="btn btn-primary">Show All</a></h5>
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