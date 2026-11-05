@extends('layouts.app')

@section('title', 'Edit Rute - transLive')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Edit Rute {{ $rute->kode }}</h2>
        <a href="{{ route('rute.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('rute.update', $rute) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('rute._form', ['rute' => $rute, 'kategoriList' => $kategoriList])
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endsection