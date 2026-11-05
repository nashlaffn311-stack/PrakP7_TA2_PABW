<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use App\Models\KategoriAngkutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class RuteController extends Controller
{
    public function index()
    {
        $ruteList = Rute::with('kategoriAngkutan')->latest()->get();

        return view('rute.index', compact('ruteList'));
    }

    public function create()
    {
        $kategoriList = KategoriAngkutan::orderBy('jenis_angkutan')->get();

        return view('rute.create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());
        $validated['foto_rute'] = $this->storePhoto($request);

        Rute::create($validated);

        return redirect()->route('rute.index')->with('success', 'Rute berhasil ditambahkan!');
    }

    public function show(Rute $rute)
    {
        $rute->load('kategoriAngkutan');

        return view('rute.show', compact('rute'));
    }

    public function edit(Rute $rute)
    {
        $kategoriList = KategoriAngkutan::orderBy('jenis_angkutan')->get();

        return view('rute.edit', compact('rute', 'kategoriList'));
    }

    public function update(Request $request, Rute $rute)
    {
        $validated = $request->validate($this->rules($rute));
        $fotoLama = $rute->foto_rute;
        $fotoBaru = null;

        if ($request->hasFile('foto_rute')) {
            $fotoBaru = $this->storePhoto($request);
            $validated['foto_rute'] = $fotoBaru;
        }

        try {
            $rute->update($validated);
        } catch (\Throwable $exception) {
            if ($fotoBaru !== null) {
                Storage::disk('public')->delete($fotoBaru);
            }

            throw $exception;
        }

        if ($fotoBaru !== null) {
            $this->deleteStoredPhoto($fotoLama);
        }

        return redirect()->route('rute.index')->with('success', 'Rute berhasil diperbarui!');
    }

    public function destroy(Rute $rute)
    {
        $fotoRute = $rute->foto_rute;
        $rute->delete();

        $this->deleteStoredPhoto($fotoRute);

        return redirect()->route('rute.index')->with('success', 'Rute berhasil dihapus!');
    }

    private function rules(?Rute $rute = null): array
    {
        return [
            'kode' => ['required', 'string', 'max:50', 'unique:rute,kode'.($rute ? ','.$rute->id : '')],
            'kategori_angkutan_id' => ['required', 'exists:kategori_angkutan,id'],
            'asal' => ['required', 'string', 'max:255'],
            'tujuan' => ['required', 'string', 'max:255'],
            'jam' => ['required', 'string', 'max:50'],
            'tarif' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:Tersedia,Hampir Penuh,Penuh,Tidak Beroperasi'],
            'foto_rute' => [$rute ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    private function storePhoto(Request $request): string
    {
        $path = $request->file('foto_rute')->store('rute', 'public');

        if ($path === false) {
            throw new RuntimeException('Foto rute gagal disimpan.');
        }

        return $path;
    }

    private function deleteStoredPhoto(?string $path): void
    {
        if ($path !== null && str_starts_with($path, 'rute/')) {
            Storage::disk('public')->delete($path);
        }
    }
}