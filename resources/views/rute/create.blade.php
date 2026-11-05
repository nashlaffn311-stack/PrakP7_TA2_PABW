@extends('layouts.app')

@section('title', 'Tambah Rute - transLive')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Tambah Rute</h2>
        <a href="{{ route('rute.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>

    @if ($kategoriList->isEmpty())
        <div class="alert alert-warning">Tambahkan kategori angkutan terlebih dahulu sebelum membuat rute.</div>
    @else
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('rute.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('rute._form', ['rute' => null, 'kategoriList' => $kategoriList])
                    <button type="submit" class="btn btn-primary">Simpan Rute</button>
                </form>
            </div>
        </div>
    @endif
@endsection
