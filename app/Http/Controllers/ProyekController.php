<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::with(['mahasiswa', 'dosen'])->latest()->paginate(10);
        return view('proyeks.index', compact('proyeks'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('proyeks.create', compact('mahasiswas', 'dosens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'required|exists:dosens,id',
            'dokumen' => 'nullable|file|mimes:pdf,docx|max:2048', // max 2MB
            'status' => 'required|in:draft,diajukan,disetujui,ditolak',
        ]);

        if ($request->hasFile('dokumen')) {
            $validated['dokumen'] = $request->file('dokumen')->store('proyek-dokumens', 'public');
        }

        Proyek::create($validated);

        return redirect()->route('proyeks.index')->with('success', 'Proyek berhasil ditambahkan');
    }

    public function show(Proyek $proyek)
    {
        $proyek->load(['mahasiswa', 'dosen']);
        return view('proyeks.show', compact('proyek'));
    }

    public function edit(Proyek $proyek)
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('proyeks.edit', compact('proyek', 'mahasiswas', 'dosens'));
    }

    public function update(Request $request, Proyek $proyek)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'required|exists:dosens,id',
            'dokumen' => 'nullable|file|mimes:pdf,docx|max:2048',
            'status' => 'required|in:draft,diajukan,disetujui,ditolak',
        ]);

        if ($request->hasFile('dokumen')) {
            if ($proyek->dokumen) {
                Storage::disk('public')->delete($proyek->dokumen);
            }
            $validated['dokumen'] = $request->file('dokumen')->store('proyek-dokumens', 'public');
        }

        $proyek->update($validated);

        return redirect()->route('proyeks.index')->with('success', 'Proyek berhasil diperbarui');
    }

    public function destroy(Proyek $proyek)
    {
        if ($proyek->dokumen) {
            Storage::disk('public')->delete($proyek->dokumen);
        }
        
        $proyek->delete();

        return redirect()->route('proyeks.index')->with('success', 'Proyek berhasil dihapus');
    }
}