<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::latest()->paginate(10);
        return view('dosens.index', compact('dosens'));
    }

    public function create()
    {
        return view('dosens.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:dosens,nip|max:255',
            'email' => 'required|email|unique:dosens,email|max:255',
            'bidang_keahlian' => 'required|string|max:255',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    public function show(Dosen $dosen)
    {
        $dosen->load('proyeks.mahasiswa');
        return view('dosens.show', compact('dosen'));
    }

    public function edit(Dosen $dosen)
    {
        return view('dosens.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:dosens,nip,' . $dosen->id . '|max:255',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id . '|max:255',
            'bidang_keahlian' => 'required|string|max:255',
        ]);

        $dosen->update($validated);

        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil diperbarui');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil dihapus');
    }
}
