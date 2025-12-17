@extends('adminlte::page')

@section('title', 'Produk Otomotif')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-car mr-2"></i>Daftar Produk Otomotif</h1>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Produk Baru
            </a>
        @endif
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($products->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th style="width: 60px;" class="text-center">No</th>
                                <th style="width: 100px;">Gambar</th>
                                <th>Nama Produk</th>
                                <th>SKU</th>
                                <th>Kategori</th>
                                <th class="text-right">Harga</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Status</th>
                                <th class="text-center" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center align-middle">{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                                    <td class="align-middle">
                                        @if($product->image)
                                            <div class="product-image-wrapper" style="width: 60px; height: 60px; border-radius: 8px; overflow: hidden; border: 2px solid #e5e7eb;">
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; border-radius: 8px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <strong>{{ $product->name }}</strong>
                                        @if($product->brand)
                                            <br><small class="text-muted"><i class="fas fa-tag"></i> {{ $product->brand }}</small>
                                        @endif
                                    </td>
                                    <td class="align-middle"><code>{{ $product->sku }}</code></td>
                                    <td class="align-middle">
                                        <span class="badge badge-secondary">{{ $product->category->name }}</span>
                                    </td>
                                    <td class="text-right align-middle">
                                        <strong class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</strong>
                                    </td>
                                    <td class="text-center align-middle">
                                        @if($product->stock > 0)
                                            <span class="badge badge-success">{{ $product->stock }} unit</span>
                                        @else
                                            <span class="badge badge-danger">Habis</span>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <span class="status-badge badge-{{ $product->status == 'active' ? 'success' : 'danger' }}">
                                            {{ $product->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="action-buttons justify-content-center">
                                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if(auth()->user()->isAdmin())
                                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
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
                @if($products->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Menampilkan {{ $products->firstItem() ?? 0 }} sampai {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk
                        </div>
                        <div>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-car-side text-muted"></i>
                    <h4 class="mt-3">Belum ada produk</h4>
                    <p class="text-muted">Mulai dengan menambahkan produk pertama Anda</p>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('products.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus-circle mr-2"></i>Tambah Produk Pertama
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
@stop
