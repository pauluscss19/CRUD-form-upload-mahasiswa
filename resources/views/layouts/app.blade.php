<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Proyek')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-blue-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-white text-xl font-bold">
                            <i class="fas fa-graduation-cap mr-2"></i>Sistem Proyek
                        </a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="{{ route('mahasiswas.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium inline-flex items-center">
                            <i class="fas fa-user-graduate mr-2"></i>Mahasiswa
                        </a>
                        <a href="{{ route('dosens.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium inline-flex items-center">
                            <i class="fas fa-chalkboard-teacher mr-2"></i>Dosen
                        </a>
                        <a href="{{ route('proyeks.index') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-sm font-medium inline-flex items-center">
                            <i class="fas fa-project-diagram mr-2"></i>Proyek
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <p class="text-center text-sm">&copy; {{ date('Y') }} Sistem Manajemen Proyek Mahasiswa</p>
        </div>
    </footer>
</body>
</html>