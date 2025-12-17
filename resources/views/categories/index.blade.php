@extends('adminlte::page')

@section('title', 'Kategori')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-tags mr-2"></i>Daftar Kategori</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle mr-2"></i>Tambah Kategori
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($categories->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th style="width: 60px;" class="text-center">No</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th class="text-center" style="width: 200px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="text-center align-middle">{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                                    <td class="align-middle">
                                        <strong><i class="fas fa-folder text-primary mr-2"></i>{{ $category->name }}</strong>
                                    </td>
                                    <td class="align-middle">{{ $category->description ?? '-' }}</td>
                                    <td class="text-center align-middle">
                                        <div class="action-buttons justify-content-center">
                                            <a href="{{ route('categories.show', $category) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini? Produk yang terkait akan terpengaruh.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($categories->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Menampilkan {{ $categories->firstItem() ?? 0 }} sampai {{ $categories->lastItem() ?? 0 }} dari {{ $categories->total() }} kategori
                        </div>
                        <div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-tags text-muted"></i>
                    <h4 class="mt-3">Belum ada kategori</h4>
                    <p class="text-muted">Mulai dengan menambahkan kategori pertama</p>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus-circle mr-2"></i>Tambah Kategori Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>
@stop
