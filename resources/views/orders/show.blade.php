@extends('adminlte::page')

@section('title', 'Detail Pesanan')

@section('content_header')
    <h1>Detail Pesanan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Nomor Pesanan</th>
                            <td>{{ $order->order_number }}</td>
                        </tr>
                        <tr>
                            <th>Pelanggan</th>
                            <td>{{ $order->customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $order->order_date->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge badge-{{ $order->status == 'completed' ? 'success' : ($order->status == 'processing' ? 'warning' : ($order->status == 'cancelled' ? 'danger' : 'info')) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Total</th>
                            <td><strong>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong></td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td>{{ $order->notes ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <h5>Item Pesanan</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit</a>
                @endif
            </div>
        </div>
    </div>
@stop

