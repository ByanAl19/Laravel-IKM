@extends('adminlte::page')

@section('title', 'Detail Pelanggan')

@section('content_header')
    <h1>Detail Pelanggan</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td>{{ $customer->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $customer->email ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td>{{ $customer->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $customer->address ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kota</th>
                    <td>{{ $customer->city ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Provinsi</th>
                    <td>{{ $customer->province ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Kode Pos</th>
                    <td>{{ $customer->postal_code ?? '-' }}</td>
                </tr>
            </table>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Kembali</a>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning">Edit</a>
            @endif
        </div>
    </div>
@stop

