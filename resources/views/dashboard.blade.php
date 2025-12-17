@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><i class="fas fa-tachometer-alt mr-2"></i>Dashboard - IKM Otomotif</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Product::count() }}</h3>
                    <p><strong>Total Produk</strong></p>
                </div>
                <div class="icon">
                    <i class="fas fa-car"></i>
                </div>
                <a href="{{ route('products.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\Customer::count() }}</h3>
                    <p><strong>Total Pelanggan</strong></p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('customers.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Models\Order::count() }}</h3>
                    <p><strong>Total Pesanan</strong></p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('orders.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>Rp {{ number_format(\App\Models\Order::sum('total_amount'), 0, ',', '.') }}</h3>
                    <p><strong>Total Penjualan</strong></p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
                <a href="{{ route('orders.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-car mr-2"></i>Produk Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    @php
                        $latestProducts = \App\Models\Product::with('category')->latest()->take(5)->get();
                    @endphp
                    @if($latestProducts->count() > 0)
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Kategori</th>
                                    <th class="text-right">Harga</th>
                                    <th class="text-center">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestProducts as $product)
                                    <tr>
                                        <td>
                                            <strong>{{ $product->name }}</strong>
                                            <br><small class="text-muted">{{ $product->sku }}</small>
                                        </td>
                                        <td><span class="badge badge-secondary">{{ $product->category->name }}</span></td>
                                        <td class="text-right">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            @if($product->stock > 0)
                                                <span class="badge badge-success">{{ $product->stock }}</span>
                                            @else
                                                <span class="badge badge-danger">Habis</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-3 text-center text-muted">
                            <i class="fas fa-box-open fa-2x mb-2"></i>
                            <p>Belum ada produk</p>
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">Tambah Produk</a>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Lihat Semua Produk</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-shopping-cart mr-2"></i>Pesanan Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    @php
                        $latestOrders = \App\Models\Order::with('customer')->latest()->take(5)->get();
                    @endphp
                    @if($latestOrders->count() > 0)
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th>No. Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th class="text-right">Total</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestOrders as $order)
                                    <tr>
                                        <td><code>{{ $order->order_number }}</code></td>
                                        <td>{{ $order->customer->name }}</td>
                                        <td class="text-right">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'info',
                                                    'processing' => 'warning',
                                                    'completed' => 'success',
                                                    'cancelled' => 'danger'
                                                ];
                                            @endphp
                                            <span class="badge badge-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-3 text-center text-muted">
                            <i class="fas fa-shopping-cart fa-2x mb-2"></i>
                            <p>Belum ada pesanan</p>
                            <a href="{{ route('orders.create') }}" class="btn btn-sm btn-primary">Buat Pesanan</a>
                        </div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('orders.index') }}" class="btn btn-sm btn-success">Lihat Semua Pesanan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Selamat Datang</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Sistem Manajemen IKM Otomotif</h4>
                            <p class="text-muted">Selamat datang di sistem manajemen untuk Industri Kecil Menengah (IKM) Otomotif.</p>
                            <p><strong>Anda login sebagai:</strong> <span class="badge badge-info">{{ auth()->user()->name }}</span> - <span class="badge badge-secondary">{{ ucfirst(auth()->user()->role->name) }}</span></p>
                            <hr>
                            <h6><i class="fas fa-list-check mr-2"></i>Fitur yang Tersedia:</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    @if(auth()->user()->isAdmin())
                                        <ul>
                                            <li><i class="fas fa-check text-success mr-2"></i>Manajemen Kategori Produk</li>
                                            <li><i class="fas fa-check text-success mr-2"></i>Manajemen Produk Otomotif</li>
                                            <li><i class="fas fa-check text-success mr-2"></i>Manajemen Data Pelanggan</li>
                                            <li><i class="fas fa-check text-success mr-2"></i>Manajemen Pesanan</li>
                                        </ul>
                                    @else
                                        <ul>
                                            <li><i class="fas fa-check text-success mr-2"></i>Lihat Daftar Produk</li>
                                            <li><i class="fas fa-check text-success mr-2"></i>Lihat Data Pelanggan</li>
                                            <li><i class="fas fa-check text-success mr-2"></i>Membuat Pesanan Baru</li>
                                            <li><i class="fas fa-check text-success mr-2"></i>Melihat Pesanan</li>
                                        </ul>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="alert alert-info">
                                        <strong><i class="fas fa-lightbulb mr-2"></i>Tip:</strong><br>
                                        Gunakan menu sidebar untuk navigasi cepat ke semua fitur sistem.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="fas fa-car-side fa-10x text-muted" style="opacity: 0.1;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
