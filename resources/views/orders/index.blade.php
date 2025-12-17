@extends('adminlte::page')

@section('title', 'Pesanan')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-shopping-cart mr-2"></i>Daftar Pesanan</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Pesanan Baru
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($orders->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th style="width: 60px;" class="text-center">No</th>
                                <th>Nomor Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Tanggal</th>
                                <th class="text-right">Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-center align-middle">{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}</td>
                                    <td class="align-middle">
                                        <strong><code>{{ $order->order_number }}</code></strong>
                                    </td>
                                    <td class="align-middle">
                                        <i class="fas fa-user text-primary mr-2"></i>{{ $order->customer->name }}
                                    </td>
                                    <td class="align-middle">{{ $order->order_date->format('d M Y') }}</td>
                                    <td class="text-right align-middle">
                                        <strong class="text-success">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong>
                                    </td>
                                    <td class="text-center align-middle">
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
                                        <span class="status-badge badge-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                            {{ $statusLabels[$order->status] ?? ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="action-buttons justify-content-center">
                                            <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if(auth()->user()->isAdmin())
                                                <a href="{{ route('orders.edit', $order) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($orders->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Menampilkan {{ $orders->firstItem() ?? 0 }} sampai {{ $orders->lastItem() ?? 0 }} dari {{ $orders->total() }} pesanan
                        </div>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-shopping-cart text-muted"></i>
                    <h4 class="mt-3">Belum ada pesanan</h4>
                    <p class="text-muted">Mulai dengan membuat pesanan pertama</p>
                    <a href="{{ route('orders.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus-circle mr-2"></i>Buat Pesanan Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@stop
