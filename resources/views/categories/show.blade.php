@extends('adminlte::page')

@section('title', 'Detail Kategori')

@section('content_header')
    <h1>Detail Kategori</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>{{ $category->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Dibuat</th>
                    <td>{{ $category->created_at->format('d M Y H:i') }}</td>
                </tr>
            </table>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>
            @endif
        </div>
    </div>
@stop

