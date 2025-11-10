@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
        <i class="fas fa-user-plus text-blue-600"></i> Tambah Mahasiswa Baru
    </h1>
</div>

<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('mahasiswas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-semibold mb-2">
                Nama Lengkap <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nama') border-red-500 @enderror"
                   required>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nim" class="block text-gray-700 font-semibold mb-2">
                NIM <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nim" id="nim" value="{{ old('nim') }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nim') border-red-500 @enderror"
                   required>
            @error('nim')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">
                Email <span class="text-red-500">*</span>
            </label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-500 @enderror"
                   required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="foto" class="block text-gray-700 font-semibold mb-2">
                Foto Profil
            </label>
            <input type="file" name="foto" id="foto" accept="image/jpeg,image/jpg,image/png"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('foto') border-red-500 @enderror">
            <p class="text-gray-500 text-sm mt-1">Format: JPG, JPEG, PNG. Maksimal 1MB</p>
            @error('foto')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('mahasiswas.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
        </div>
    </form>
</div>
@endsection