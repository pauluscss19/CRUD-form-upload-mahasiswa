@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
        <i class="fas fa-user-edit text-green-600"></i> Edit Data Dosen
    </h1>
</div>

<div class="bg-white rounded-lg shadow-lg p-6">
    <form action="{{ route('dosens.update', $dosen) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="nama" class="block text-gray-700 font-semibold mb-2">
                Nama Lengkap <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $dosen->nama) }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('nama') border-red-500 @enderror"
                   required>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nip" class="block text-gray-700 font-semibold mb-2">
                NIP <span class="text-red-500">*</span>
            </label>
            <input type="text" name="nip" id="nip" value="{{ old('nip', $dosen->nip) }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('nip') border-red-500 @enderror"
                   required>
            @error('nip')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">
                Email <span class="text-red-500">*</span>
            </label>
            <input type="email" name="email" id="email" value="{{ old('email', $dosen->email) }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror"
                   required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="bidang_keahlian" class="block text-gray-700 font-semibold mb-2">
                Bidang Keahlian <span class="text-red-500">*</span>
            </label>
            <input type="text" name="bidang_keahlian" id="bidang_keahlian" value="{{ old('bidang_keahlian', $dosen->bidang_keahlian) }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('bidang_keahlian') border-red-500 @enderror"
                   required>
            @error('bidang_keahlian')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('dosens.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-save mr-2"></i>Update
            </button>
        </div>
    </form>
</div>
@endsection