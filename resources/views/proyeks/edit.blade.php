@extends('layouts.app')

@section('title', 'Edit Proyek')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
        <i class="fas fa-edit text-purple-600"></i> Edit Proyek
    </h1>
</div>

<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('proyeks.update', $proyek) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="judul" class="block text-gray-700 font-semibold mb-2">
                Judul Proyek <span class="text-red-500">*</span>
            </label>
            <input type="text" name="judul" id="judul" value="{{ old('judul', $proyek->judul) }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('judul') border-red-500 @enderror"
                   required>
            @error('judul')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">
                Deskripsi <span class="text-red-500">*</span>
            </label>
            <textarea name="deskripsi" id="deskripsi" rows="5" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('deskripsi') border-red-500 @enderror"
                      required>{{ old('deskripsi', $proyek->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="mahasiswa_id" class="block text-gray-700 font-semibold mb-2">
                    Mahasiswa <span class="text-red-500">*</span>
                </label>
                <select name="mahasiswa_id" id="mahasiswa_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('mahasiswa_id') border-red-500 @enderror"
                        required>
                    <option value="">-- Pilih Mahasiswa --</option>
                    @foreach($mahasiswas as $mahasiswa)
                        <option value="{{ $mahasiswa->id }}" 
                                {{ old('mahasiswa_id', $proyek->mahasiswa_id) == $mahasiswa->id ? 'selected' : '' }}>
                            {{ $mahasiswa->nama }} ({{ $mahasiswa->nim }})
                        </option>
                    @endforeach
                </select>
                @error('mahasiswa_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="dosen_id" class="block text-gray-700 font-semibold mb-2">
                    Dosen Pembimbing <span class="text-red-500">*</span>
                </label>
                <select name="dosen_id" id="dosen_id" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('dosen_id') border-red-500 @enderror"
                        required>
                    <option value="">-- Pilih Dosen --</option>
                    @foreach($dosens as $dosen)
                        <option value="{{ $dosen->id }}" 
                                {{ old('dosen_id', $proyek->dosen_id) == $dosen->id ? 'selected' : '' }}>
                            {{ $dosen->nama }} - {{ $dosen->bidang_keahlian }}
                        </option>
                    @endforeach
                </select>
                @error('dosen_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-semibold mb-2">
                Status <span class="text-red-500">*</span>
            </label>
            <select name="status" id="status" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('status') border-red-500 @enderror"
                    required>
                <option value="draft" {{ old('status', $proyek->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="diajukan" {{ old('status', $proyek->status) == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                <option value="disetujui" {{ old('status', $proyek->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                <option value="ditolak" {{ old('status', $proyek->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="dokumen" class="block text-gray-700 font-semibold mb-2">
                Dokumen Proyek
            </label>
            @if($proyek->dokumen)
                <div class="mb-2 p-3 bg-gray-100 rounded-lg">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-file mr-2"></i>Dokumen saat ini: 
                        <a href="{{ asset('storage/' . $proyek->dokumen) }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ basename($proyek->dokumen) }}
                        </a>
                    </p>
                </div>
            @endif
            <input type="file" name="dokumen" id="dokumen" accept=".pdf,.docx"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 @error('dokumen') border-red-500 @enderror">
            <p class="text-gray-500 text-sm mt-1">Format: PDF, DOCX. Maksimal 2MB. Kosongkan jika tidak ingin mengganti</p>
            @error('dokumen')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('proyeks.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
            <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">
                <i class="fas fa-save mr-2"></i>Update
            </button>
        </div>
    </form>
</div>
@endsection