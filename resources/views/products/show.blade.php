@extends('adminlte::page')

@section('title', 'Detail Produk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-car mr-2"></i>Detail Produk</h1>
        <div>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
            @endif
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow-sm mb-3">
                <div class="card-body text-center p-4">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid img-product mb-3" style="max-height: 400px;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center mb-3" style="height: 400px; border-radius: 8px;">
                            <div>
                                <i class="fas fa-image fa-5x text-muted"></i>
                                <p class="text-muted mt-3">Tidak ada gambar</p>
                            </div>
                        </div>
                    @endif
                    <h4 class="mb-2">{{ $product->name }}</h4>
                    <h3 class="text-primary font-weight-bold mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    <span class="status-badge badge-{{ $product->status == 'active' ? 'success' : 'danger' }} mb-3">
                        {{ $product->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card shadow-sm mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Informasi Produk</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200"><i class="fas fa-barcode mr-2"></i>SKU</th>
                            <td><code>{{ $product->sku }}</code></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-folder mr-2"></i>Kategori</th>
                            <td><span class="badge badge-secondary">{{ $product->category->name }}</span></td>
                        </tr>
                        @if($product->brand)
                        <tr>
                            <th><i class="fas fa-industry mr-2"></i>Brand/Merek</th>
                            <td>{{ $product->brand }}</td>
                        </tr>
                        @endif
                        @if($product->part_number)
                        <tr>
                            <th><i class="fas fa-hashtag mr-2"></i>Part Number</th>
                            <td>{{ $product->part_number }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th><i class="fas fa-boxes mr-2"></i>Stok</th>
                            <td>
                                @if($product->stock > 0)
                                    <span class="badge badge-success">{{ $product->stock }} unit tersedia</span>
                                @else
                                    <span class="badge badge-danger">Stok habis</span>
                                @endif
                            </td>
                        </tr>
                        @if($product->description)
                        <tr>
                            <th><i class="fas fa-align-left mr-2"></i>Deskripsi</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th><i class="fas fa-calendar mr-2"></i>Dibuat</th>
                            <td>{{ $product->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-calendar-alt mr-2"></i>Diupdate</th>
                            <td>{{ $product->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0"><i class="fas fa-exclamation-triangle mr-2"></i>Aksi</h5>
                </div>
                <div class="card-body">
                    @if(auth()->user()->isAdmin())
                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fas fa-trash mr-2"></i>Hapus Produk
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
