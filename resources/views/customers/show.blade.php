@extends('adminlte::page')

@section('title', 'Detail Pelanggan')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-users mr-2"></i>Detail Pelanggan</h1>
        <div>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
            @endif
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user mr-2"></i>Informasi Pelanggan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200"><i class="fas fa-user mr-2"></i>Nama</th>
                            <td><strong>{{ $customer->name }}</strong></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-envelope mr-2"></i>Email</th>
                            <td>{{ $customer->email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-phone mr-2"></i>Telepon</th>
                            <td>{{ $customer->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-map-marker-alt mr-2"></i>Alamat</th>
                            <td>{{ $customer->address ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-city mr-2"></i>Kota</th>
                            <td>{{ $customer->city ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-map mr-2"></i>Provinsi</th>
                            <td>{{ $customer->province ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-mail-bulk mr-2"></i>Kode Pos</th>
                            <td>{{ $customer->postal_code ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
