@extends('layouts.app')

@section('title', 'Daftar Rute - transLive')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
        <h2 class="fw-bold mb-0">Daftar Rute Bus & Angkutan</h2>
        <a href="{{ route('rute.create') }}" class="btn btn-primary">Tambah Rute</a>
    </div>

    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    <div class="row mt-4">
        @forelse($ruteList as $ruteItem)
            <div class="col-md-4 mb-4">
                @include('partials.rute-card', ['rute' => $ruteItem])
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Belum ada data rute yang tersedia.
                </div>
            </div>
        @endforelse
    </div>
@endsection