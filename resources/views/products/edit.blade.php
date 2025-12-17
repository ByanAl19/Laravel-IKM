@extends('adminlte::page')

@section('title', 'Edit Produk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-edit mr-2"></i>Edit Produk: {{ $product->name }}</h1>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Informasi Produk</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name"><i class="fas fa-tag mr-2"></i>Nama Produk <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sku"><i class="fas fa-barcode mr-2"></i>SKU <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" required>
                                            @error('sku')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="category_id"><i class="fas fa-folder mr-2"></i>Kategori <span class="text-danger">*</span></label>
                                    <select class="form-select form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description"><i class="fas fa-align-left mr-2"></i>Deskripsi</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="brand"><i class="fas fa-industry mr-2"></i>Brand/Merek</label>
                                            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $product->brand) }}">
                                            @error('brand')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="part_number"><i class="fas fa-hashtag mr-2"></i>Part Number</label>
                                            <input type="text" class="form-control @error('part_number') is-invalid @enderror" id="part_number" name="part_number" value="{{ old('part_number', $product->part_number) }}">
                                            @error('part_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fas fa-dollar-sign mr-2"></i>Harga & Stok</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price"><i class="fas fa-money-bill-wave mr-2"></i>Harga <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp</span>
                                                </div>
                                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="stock"><i class="fas fa-boxes mr-2"></i>Stok <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $product->stock) }}" required>
                                            @error('stock')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status"><i class="fas fa-toggle-on mr-2"></i>Status <span class="text-danger">*</span></label>
                                            <select class="form-select form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                                <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0"><i class="fas fa-image mr-2"></i>Gambar Produk</h5>
                            </div>
                            <div class="card-body">
                                @if($product->image)
                                    <div class="mb-3">
                                        <label>Gambar Saat Ini:</label>
                                        <div class="text-center">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid img-product" style="max-height: 250px;">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="image">Ganti Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                                        <label class="custom-file-label" for="image">Pilih file baru...</label>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
                                </div>
                                <div id="imagePreview" class="text-center mt-3" style="display: none;">
                                    <label>Preview Gambar Baru:</label>
                                    <img id="preview" src="" alt="Preview" class="img-fluid img-product" style="max-height: 250px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save mr-2"></i>Update Produk
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-times mr-2"></i>Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@stop

@push('js')
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').setAttribute('src', e.target.result);
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih file baru...';
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endpush
