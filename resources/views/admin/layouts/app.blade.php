<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Blog Farrel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css " />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Hilangkan scrollbar vertikal di semua browser */
        .no-scrollbar {
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none;  /* IE 10+ */
        }

        .no-scrollbar::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
        }

    </style>
</head>
<body class="h-screen bg-[#F8F3D9]">

    <!-- Topbar -->
    @include('admin.layouts.topbar')

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-6 ml-14 mr-30">
            @yield('content')
        </main>

    </div>

    <!-- Footer -->
    @include('admin.layouts.footer')

    @stack('scripts') <!-- Untuk JS tambahan per halaman -->
</body>
</html>