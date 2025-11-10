@extends('layouts.app')

@section('title', 'Detail Proyek')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">
        <i class="fas fa-project-diagram text-purple-600"></i> Detail Proyek
    </h1>
    <div class="space-x-2">
        <a href="{{ route('proyeks.edit', $proyek) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
            <i class="fas fa-edit mr-2"></i>Edit
        </a>
        <a href="{{ route('proyeks.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Main Content -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <h2 class="text-2xl font-bold text-gray-800">{{ $proyek->judul }}</h2>
                <span class="px-4 py-2 rounded-full text-sm font-semibold
                    @if($proyek->status == 'disetujui') bg-green-100 text-green-800
                    @elseif($proyek->status == 'diajukan') bg-blue-100 text-blue-800
                    @elseif($proyek->status == 'ditolak') bg-red-100 text-red-800
                    @else bg-gray-100 text-gray-800
                    @endif">
                    {{ ucfirst($proyek->status) }}
                </span>
            </div>
            
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Proyek</h3>
                <p class="text-gray-600 leading-relaxed">{{ $proyek->deskripsi }}</p>
            </div>

            @if($proyek->dokumen)
            <div class="border-t pt-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-3">Dokumen Proyek</h3>
                <a href="{{ asset('storage/' . $proyek->dokumen) }}" target="_blank" 
                   class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition">
                    <i class="fas fa-file-download mr-2"></i>
                    Download Dokumen
                </a>
            </div>
            @endif
        </div>

        <!-- Timeline/Info -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i>Informasi Tambahan
            </h3>
            <div class="space-y-3">
                <div class="flex items-center">
                    <i class="fas fa-calendar-plus text-gray-500 w-8"></i>
                    <div>
                        <p class="text-sm text-gray-500">Dibuat pada</p>
                        <p class="font-semibold text-gray-800">{{ $proyek->created_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-calendar-check text-gray-500 w-8"></i>
                    <div>
                        <p class="text-sm text-gray-500">Terakhir diperbarui</p>
                        <p class="font-semibold text-gray-800">{{ $proyek->updated_at->format('d M Y, H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="lg:col-span-1">
        <!-- Mahasiswa Card -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-user-graduate text-blue-600 mr-2"></i>Mahasiswa
            </h3>
            <div class="text-center">
                @if($proyek->mahasiswa->foto)
                    <img src="{{ asset('storage/' . $proyek->mahasiswa->foto) }}" 
                         alt="{{ $proyek->mahasiswa->nama }}" 
                         class="h-20 w-20 rounded-full object-cover mx-auto mb-3">
                @else
                    <div class="h-20 w-20 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-user text-blue-600 text-2xl"></i>
                    </div>
                @endif
                <h4 class="font-bold text-gray-800 mb-1">{{ $proyek->mahasiswa->nama }}</h4>
                <p class="text-sm text-gray-600 mb-1">{{ $proyek->mahasiswa->nim }}</p>
                <p class="text-sm text-gray-600">{{ $proyek->mahasiswa->email }}</p>
                <a href="{{ route('mahasiswas.show', $proyek->mahasiswa) }}" 
                   class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm">
                    Lihat Profil <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Dosen Card -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-chalkboard-teacher text-green-600 mr-2"></i>Dosen Pembimbing
            </h3>
            <div class="text-center">
                <div class="h-20 w-20 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-3">
                    <i class="fas fa-user-tie text-green-600 text-2xl"></i>
                </div>
                <h4 class="font-bold text-gray-800 mb-1">{{ $proyek->dosen->nama }}</h4>
                <p class="text-sm text-gray-600 mb-1">NIP: {{ $proyek->dosen->nip }}</p>
                <p class="text-sm text-gray-600 mb-1">{{ $proyek->dosen->email }}</p>
                <div class="mt-2 px-3 py-1 bg-green-50 rounded-lg">
                    <p class="text-xs text-green-700 font-medium">{{ $proyek->dosen->bidang_keahlian }}</p>
                </div>
                <a href="{{ route('dosens.show', $proyek->dosen) }}" 
                   class="mt-3 inline-block text-green-600 hover:text-green-800 text-sm">
                    Lihat Profil <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection