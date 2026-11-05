<div class="row">
    <div class="col-md-6 mb-3">
        <label for="kode" class="form-label">Kode Rute</label>
        <input id="kode" type="text" name="kode" value="{{ old('kode', $rute->kode ?? '') }}" class="form-control @error('kode') is-invalid @enderror" required maxlength="50">
        @error('kode') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="kategori_angkutan_id" class="form-label">Kategori Angkutan</label>
        <select id="kategori_angkutan_id" name="kategori_angkutan_id" class="form-select @error('kategori_angkutan_id') is-invalid @enderror" required>
            <option value="">Pilih kategori</option>
            @foreach ($kategoriList as $kategori)
                <option value="{{ $kategori->id }}" @selected(old('kategori_angkutan_id', $rute->kategori_angkutan_id ?? '') == $kategori->id)>
                    {{ $kategori->jenis_angkutan }}
                </option>
            @endforeach
        </select>
        @error('kategori_angkutan_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="asal" class="form-label">Asal</label>
        <input id="asal" type="text" name="asal" value="{{ old('asal', $rute->asal ?? '') }}" class="form-control @error('asal') is-invalid @enderror" required maxlength="255">
        @error('asal') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="tujuan" class="form-label">Tujuan</label>
        <input id="tujuan" type="text" name="tujuan" value="{{ old('tujuan', $rute->tujuan ?? '') }}" class="form-control @error('tujuan') is-invalid @enderror" required maxlength="255">
        @error('tujuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="jam" class="form-label">Jam Keberangkatan</label>
        <input id="jam" type="text" name="jam" value="{{ old('jam', $rute->jam ?? '') }}" class="form-control @error('jam') is-invalid @enderror" placeholder="Contoh: 08:00 WIB" required maxlength="50">
        @error('jam') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="tarif" class="form-label">Tarif (Rp)</label>
        <input id="tarif" type="number" name="tarif" value="{{ old('tarif', $rute->tarif ?? '') }}" class="form-control @error('tarif') is-invalid @enderror" min="0" required>
        @error('tarif') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
            @foreach (['Tersedia', 'Hampir Penuh', 'Penuh', 'Tidak Beroperasi'] as $status)
                <option value="{{ $status }}" @selected(old('status', $rute->status ?? 'Tersedia') === $status)>{{ $status }}</option>
            @endforeach
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="foto_rute" class="form-label">Foto Rute {{ $rute ? '(opsional)' : '' }}</label>
        <input id="foto_rute" type="file" name="foto_rute" class="form-control @error('foto_rute') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp" {{ $rute ? '' : 'required' }}>
        <div class="form-text">Format JPG, PNG, atau WEBP; ukuran maksimal 2 MB.</div>
        @error('foto_rute') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if ($rute?->foto_url)
            <img src="{{ $rute->foto_url }}" alt="Foto rute saat ini" class="img-thumbnail mt-2" style="max-height: 180px;">
        @endif
    </div>
</div>
