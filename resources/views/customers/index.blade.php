@extends('adminlte::page')

@section('title', 'Pelanggan')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-users mr-2"></i>Daftar Pelanggan</h1>
        @if(auth()->user()->isAdmin())
            <a href="{{ route('customers.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle mr-2"></i>Tambah Pelanggan Baru
            </a>
        @endif
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-body p-0">
            @if($customers->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th style="width: 60px;" class="text-center">No</th>
                                <th>Nama Pelanggan</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Kota</th>
                                <th class="text-center" style="width: 180px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td class="text-center align-middle">{{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}</td>
                                    <td class="align-middle">
                                        <strong><i class="fas fa-user text-primary mr-2"></i>{{ $customer->name }}</strong>
                                    </td>
                                    <td class="align-middle">{{ $customer->email ?? '-' }}</td>
                                    <td class="align-middle">{{ $customer->phone ?? '-' }}</td>
                                    <td class="align-middle">{{ $customer->city ?? '-' }}</td>
                                    <td class="text-center align-middle">
                                        <div class="action-buttons justify-content-center">
                                            <a href="{{ route('customers.show', $customer) }}" class="btn btn-sm btn-info" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            @if(auth()->user()->isAdmin())
                                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">
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
                @if($customers->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Menampilkan {{ $customers->firstItem() ?? 0 }} sampai {{ $customers->lastItem() ?? 0 }} dari {{ $customers->total() }} pelanggan
                        </div>
                        <div>
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-users text-muted"></i>
                    <h4 class="mt-3">Belum ada pelanggan</h4>
                    <p class="text-muted">Mulai dengan menambahkan pelanggan pertama</p>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('customers.create') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-plus-circle mr-2"></i>Tambah Pelanggan Pertama
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
@stop
