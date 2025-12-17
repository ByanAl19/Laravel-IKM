@extends('adminlte::page')

@section('title', 'Detail Kategori')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1><i class="fas fa-tags mr-2"></i>Detail Kategori</h1>
        <div>
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
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
                    <h5 class="mb-0"><i class="fas fa-info-circle mr-2"></i>Informasi Kategori</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="200"><i class="fas fa-tag mr-2"></i>Nama</th>
                            <td><strong>{{ $category->name }}</strong></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-align-left mr-2"></i>Deskripsi</th>
                            <td>{{ $category->description ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-calendar mr-2"></i>Dibuat</th>
                            <td>{{ $category->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-calendar-alt mr-2"></i>Diupdate</th>
                            <td>{{ $category->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
