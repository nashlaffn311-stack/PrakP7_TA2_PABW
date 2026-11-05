<div class="card h-100 shadow-sm border-0">
    @if($rute->foto_url)
        <img src="{{ $rute->foto_url }}" class="card-img-top" alt="Foto rute {{ $rute->asal }} ke {{ $rute->tujuan }}" style="height: 200px; object-fit: cover;">
    @endif
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="badge bg-secondary">{{ $rute->kode }}</span>
            
            @if($rute->status === 'Tersedia')
                <span class="badge bg-success">Tersedia</span>
            @elseif($rute->status === 'Hampir Penuh')
                <span class="badge bg-warning text-dark">Hampir Penuh</span>
            @else
                <span class="badge bg-danger">Penuh</span>
            @endif
        </div>

        <h5 class="card-title text-primary fw-bold">{{ $rute->asal }} &rarr; {{ $rute->tujuan }}</h5>
        @if($rute->kategoriAngkutan)
            <p class="card-text text-muted mb-1">{{ $rute->kategoriAngkutan->jenis_angkutan }}</p>
        @endif
        <p class="card-text text-muted mb-1">Jam: <strong>{{ $rute->jam }}</strong></p>
        <p class="card-text text-dark fw-bold">Tarif: Rp {{ number_format($rute->tarif, 0, ',', '.') }}</p>

        <div class="d-flex gap-2">
            <a href="{{ route('rute.show', $rute) }}" class="btn btn-outline-primary btn-sm flex-fill">Detail</a>
            <a href="{{ route('rute.edit', $rute) }}" class="btn btn-outline-secondary btn-sm flex-fill">Edit</a>
            <form action="{{ route('rute.destroy', $rute) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus rute ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
            </form>
        </div>
    </div>
</div>