@extends('adminlte::page')

@section('title', 'Detail Produk')

@section('content_header')
    <h1>Detail Produk</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                    @else
                        <div class="text-center text-muted">No Image</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>SKU</th>
                            <td>{{ $product->sku }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>{{ $product->stock }}</td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{ $product->brand ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Part Number</th>
                            <td>{{ $product->part_number ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge badge-{{ $product->status == 'active' ? 'success' : 'danger' }}">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $product->description ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
                @endif
            </div>
        </div>
    </div>
@stop

