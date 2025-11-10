@extends('layouts.app')

@section('title', 'Beranda - Manajemen Proyek')

@section('content')
<div class="text-center">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">
        <i class="fas fa-graduation-cap text-blue-600"></i>
        Selamat Datang di Sistem Manajemen Proyek
    </h1>
    <p class="text-xl text-gray-600 mb-8">Kelola proyek mahasiswa dengan mudah dan efisien</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        <!-- Mahasiswa Card -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="text-blue-600 text-5xl mb-4">
                <i class="fas fa-user-graduate"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Mahasiswa</h2>
            <p class="text-gray-600 mb-4">Kelola data mahasiswa dan profil mereka</p>
            <a href="{{ route('mahasiswas.index') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                Lihat Mahasiswa
            </a>
        </div>

        <!-- Dosen Card -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="text-green-600 text-5xl mb-4">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Dosen</h2>
            <p class="text-gray-600 mb-4">Kelola data dosen pembimbing</p>
            <a href="{{ route('dosens.index') }}" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Lihat Dosen
            </a>
        </div>

        <!-- Proyek Card -->
        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
            <div class="text-purple-600 text-5xl mb-4">
                <i class="fas fa-project-diagram"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Proyek</h2>
            <p class="text-gray-600 mb-4">Kelola proyek dan pengajuan mahasiswa</p>
            <a href="{{ route('proyeks.index') }}" class="inline-block bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">
                Lihat Proyek
            </a>
        </div>
    </div>
</div>
@endsection