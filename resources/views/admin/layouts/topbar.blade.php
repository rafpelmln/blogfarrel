<header class="h-auto w-63 sm:w-4/5 bg-[#B9B28A] rounded-2xl flex items-center justify-center sm:justify-between px-6 py-4 mx-auto mt-4 shadow-md">
    <div>
        <h1 class="text-xl font-bold text-[#504B38]">@yield('page-title', 'Dashboard')</h1>
    </div>

    <div class="flex items-center space-x-4">
        @if (session('success'))
            <div id="success-alert" class="absolute left-84 opacity-0 -translate-y-2 transition-all duration-500">
                <div class="bg-[#504B38] text-[#F8F3D9] py-3 rounded-lg px-5 font-medium relative">
                    <i class="fa-solid fa-bell pr-3 absolute animate-ping duration-[5s] opacity-50 left-6 top-4"></i>
                    <i class="fa-solid fa-bell pr-3 relative"></i> |
                    {{ session('success') }} 
                </div>
            </div>

            <script>
                const alertBox = document.getElementById('success-alert');
                setTimeout(() => {
                    alertBox.classList.remove('opacity-0', '-translate-y-2');
                    alertBox.classList.add('opacity-100', 'translate-y-0');
                }, 100);

                setTimeout(() => {
                    alertBox.style.transition = 'opacity 0.5s ease';
                    alertBox.style.opacity = '0';
                    setTimeout(() => alertBox.remove(), 500);
                }, 3000);
            </script>
        @endif


        {{-- Kalau halaman artikel, tampilkan dropdown kategori --}}
        @if (Request::is('admin/artikel*') && isset($kategoriList))
            <form method="GET" action="{{ route('admin.artikel.index') }}" class="sm:flex">
                <select name="kategori" onchange="this.form.submit()"
                    class="text-sm bg-[#EBE5C2] text-[#504B38] rounded-lg px-3 py-1 shadow focus:border-[#504B38]">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoriList as $kategori)
                        <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </form>
        @endif

        <form method="POST" action="{{ route('logout') }}" class="hidden sm:flex">
            @csrf
            <button type="submit" class="bg-[#504B38] text-[#F8F3D9] px-4 font-medium py-2 rounded">Logout</button>
        </form>
    </div>
</header>
