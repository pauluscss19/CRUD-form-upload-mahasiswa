@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-3xl font-bold text-gray-800">
        <i class="fas fa-user text-blue-600"></i> Detail Mahasiswa
    </h1>
    <div class="space-x-2">
        <a href="{{ route('mahasiswas.edit', $mahasiswa) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
            <i class="fas fa-edit mr-2"></i>Edit
        </a>
        <a href="{{ route('mahasiswas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Card -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            @if($mahasiswa->foto)
                <img src="{{ asset('storage/' . $mahasiswa->foto) }}" alt="{{ $mahasiswa->nama }}" class="h-32 w-32 rounded-full object-cover mx-auto mb-4">
            @else
                <div class="h-32 w-32 rounded-full bg-gray-300 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-gray-600 text-4xl"></i>
                </div>
            @endif
            <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $mahasiswa->nama }}</h2>
            <p class="text-gray-600 mb-1"><i class="fas fa-id-card mr-2"></i>{{ $mahasiswa->nim }}</p>
            <p class="text-gray-600"><i class="fas fa-envelope mr-2"></i>{{ $mahasiswa->email }}</p>
        </div>
    </div>

    <!-- Projects List -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">
                <i class="fas fa-project-diagram text-purple-600 mr-2"></i>Proyek yang Dikerjakan
            </h3>
            
            @if($mahasiswa->proyeks->count() > 0)
                <div class="space-y-4">
                    @foreach($mahasiswa->proyeks as $proyek)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="text-lg font-semibold text-gray-800">{{ $proyek->judul }}</h4>
                                <span class="px-3 py-1 rounded-full text-sm font-semibold
                                    @if($proyek->status == 'disetujui') bg-green-100 text-green-800
                                    @elseif($proyek->status == 'diajukan') bg-blue-100 text-blue-800
                                    @elseif($proyek->status == 'ditolak') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($proyek->status) }}
                                </span>
                            </div>
                            <p class="text-gray-600 text-sm mb-2">{{ Str::limit($proyek->deskripsi, 150) }}</p>
                            <div class="flex justify-between items-center">
                                <p class="text-sm text-gray-500">
                                    <i class="fas fa-chalkboard-teacher mr-1"></i>
                                    Pembimbing: <strong>{{ $proyek->dosen->nama }}</strong>
                                </p>
                                <a href="{{ route('proyeks.show', $proyek) }}" class="text-blue-600 hover:text-blue-800 text-sm">
                                    Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-folder-open text-4xl mb-3"></i>
                    <p>Belum ada proyek yang dikerjakan</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection