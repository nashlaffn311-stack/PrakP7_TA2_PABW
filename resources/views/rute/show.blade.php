@extends('layouts.app')

@section('title', 'Detail Rute - transLive')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">Detail Rute {{ $rute->kode }}</h2>
        <a href="{{ route('rute.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>

    <div class="card shadow-sm border-0">
        @if ($rute->foto_url)
            <img src="{{ $rute->foto_url }}" class="card-img-top" alt="Foto rute {{ $rute->asal }} ke {{ $rute->tujuan }}" style="max-height: 420px; object-fit: cover;">
        @endif
        <div class="card-body">
            <h3 class="card-title text-primary fw-bold">{{ $rute->asal }} &rarr; {{ $rute->tujuan }}</h3>
            <dl class="row mb-4">
                <dt class="col-sm-3">Kategori</dt>
                <dd class="col-sm-9">{{ $rute->kategoriAngkutan?->jenis_angkutan ?? '-' }}</dd>
                <dt class="col-sm-3">Jam</dt>
                <dd class="col-sm-9">{{ $rute->jam }}</dd>
                <dt class="col-sm-3">Tarif</dt>
                <dd class="col-sm-9">Rp {{ number_format($rute->tarif, 0, ',', '.') }}</dd>
                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">{{ $rute->status }}</dd>
            </dl>
            <a href="{{ route('rute.edit', $rute) }}" class="btn btn-primary">Edit Rute</a>
        </div>
    </div>
@endsection
