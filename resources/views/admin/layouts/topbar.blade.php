<header class="h-auto w-4/5 bg-[#B9B28A] rounded-2xl flex items-center justify-between px-6 py-4 mx-auto mt-4 shadow-md">
    <div>
        <h1 class="text-xl font-semibold">@yield('page-title', 'Dashboard')</h1>
    </div>

    <div class="flex items-center space-x-4">
        {{-- Kalau halaman artikel, tampilkan dropdown kategori --}}
        @if (Request::is('admin/artikel*') && isset($kategoriList))
            <form method="GET" action="{{ route('admin.artikel.index') }}" class="">
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


        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-[#504B38] text-[#F8F3D9] px-4 py-1 rounded">Logout</button>
        </form>
    </div>
</header>
