@extends('adminlte::page')

@section('title', 'Detail Pesanan')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-shopping-cart mr-2"></i>Detail Pesanan: {{ $order->order_number }}</h1>
        <div>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
            @endif
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Informasi Pesanan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150"><i class="fas fa-hashtag mr-2"></i>Nomor Pesanan</th>
                            <td><code>{{ $order->order_number }}</code></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-user mr-2"></i>Pelanggan</th>
                            <td><strong>{{ $order->customer->name }}</strong></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-calendar mr-2"></i>Tanggal</th>
                            <td>{{ $order->order_date->format('d M Y') }}</td>
                        </tr>
                        @php
                            $statusColors = [
                                'pending' => 'info',
                                'processing' => 'warning',
                                'completed' => 'success',
                                'cancelled' => 'danger'
                            ];
                            $statusLabels = [
                                'pending' => 'Menunggu',
                                'processing' => 'Diproses',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan'
                            ];
                        @endphp
                        <tr>
                            <th><i class="fas fa-toggle-on mr-2"></i>Status</th>
                            <td>
                                <span class="status-badge badge-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                    {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-money-bill-wave mr-2"></i>Pembayaran</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150"><i class="fas fa-dollar-sign mr-2"></i>Total Pesanan</th>
                            <td><h4 class="text-success mb-0">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</h4></td>
                        </tr>
                        @if($order->notes)
                        <tr>
                            <th><i class="fas fa-sticky-note mr-2"></i>Catatan</th>
                            <td>{{ $order->notes }}</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0"><i class="fas fa-list mr-2"></i>Item Pesanan</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th style="width: 60px;" class="text-center">No</th>
                            <th>Produk</th>
                            <th class="text-right">Harga</th>
                            <th class="text-center">Qty</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">
                                    <strong>{{ $item->product->name }}</strong>
                                    @if($item->product->sku)
                                        <br><small class="text-muted"><code>{{ $item->product->sku }}</code></small>
                                    @endif
                                </td>
                                <td class="text-right align-middle">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="text-center align-middle">{{ $item->quantity }}</td>
                                <td class="text-right align-middle"><strong>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</strong></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-light">
                        <tr>
                            <th colspan="4" class="text-right">Total:</th>
                            <th class="text-right">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @if(auth()->user()->isAdmin())
    <div class="card shadow-sm mt-3">
        <div class="card-header bg-danger text-white">
            <h5 class="mb-0"><i class="fas fa-exclamation-triangle mr-2"></i>Aksi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini? Tindakan ini tidak dapat dibatalkan.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash mr-2"></i>Hapus Pesanan
                </button>
            </form>
        </div>
    </div>
    @endif
@stop
