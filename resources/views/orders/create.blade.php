@extends('adminlte::page')

@section('title', 'Tambah Pesanan')

@section('content_header')
    <h1>Tambah Pesanan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id">Pelanggan</label>
                            <select class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
                                <option value="">Pilih Pelanggan</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order_date">Tanggal Pesanan</label>
                            <input type="date" class="form-control @error('order_date') is-invalid @enderror" id="order_date" name="order_date" value="{{ old('order_date', date('Y-m-d')) }}" required>
                            @error('order_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <h5>Item Pesanan</h5>
                <div id="items">
                    <div class="item-row mb-2">
                        <div class="row">
                            <div class="col-md-5">
                                <select class="form-control product-select" name="items[0][product_id]" required>
                                    <option value="">Pilih Produk</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}">{{ $product->name }} (Stok: {{ $product->stock }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control quantity-input" name="items[0][quantity]" placeholder="Qty" min="1" required>
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control price-display" readonly placeholder="Harga">
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger remove-item">×</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mb-3" id="addItem">Tambah Item</button>

                <div class="form-group">
                    <label for="notes">Catatan</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                    @error('notes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    @push('js')
    <script>
        let itemIndex = 1;
        document.getElementById('addItem').addEventListener('click', function() {
            const itemsDiv = document.getElementById('items');
            const newItem = document.createElement('div');
            newItem.className = 'item-row mb-2';
            newItem.innerHTML = `
                <div class="row">
                    <div class="col-md-5">
                        <select class="form-control product-select" name="items[${itemIndex}][product_id]" required>
                            <option value="">Pilih Produk</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" data-price="{{ $product->price }}" data-stock="{{ $product->stock }}">{{ $product->name }} (Stok: {{ $product->stock }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control quantity-input" name="items[${itemIndex}][quantity]" placeholder="Qty" min="1" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control price-display" readonly placeholder="Harga">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger remove-item">×</button>
                    </div>
                </div>
            `;
            itemsDiv.appendChild(newItem);
            itemIndex++;
            attachEventListeners();
        });

        function attachEventListeners() {
            document.querySelectorAll('.remove-item').forEach(btn => {
                btn.addEventListener('click', function() {
                    this.closest('.item-row').remove();
                });
            });

            document.querySelectorAll('.product-select').forEach(select => {
                select.addEventListener('change', function() {
                    const price = this.options[this.selectedIndex].dataset.price;
                    const row = this.closest('.item-row');
                    row.querySelector('.price-display').value = price ? 'Rp ' + parseInt(price).toLocaleString('id-ID') : '';
                });
            });
        }

        attachEventListeners();
    </script>
    @endpush
@stop

