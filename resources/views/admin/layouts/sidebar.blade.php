<aside class="relative my-auto left-4 rounded-2xl w-16 bg-[#B9B28A] h-auto p-4 z-30 shadow-md">
    <ul class="space-y-4 py-4">
        {{-- Dashboard --}}
        <li class="group relative flex items-center">
            <a href="{{ Route('admin.dashboard') }}" class="flex justify-center w-full px-4 py-2 rounded hover:bg-[#EBE5C2] text-[#504B38] shadow-md">
                <i class="fas fa-tachometer-alt"></i>
            </a>
            <span class="absolute left-16 ml-2 border font-medium bg-[#EBE5C2] text-[#504B38] text-sm px-4 py-2 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50 pointer-events-none">
                Dashboard
            </span>
        </li>

        {{-- Kategori --}}
        <li class="group relative flex items-center">
            <a href="{{ Route('admin.kategori.index') }}" class="flex justify-center w-full px-4 py-2 rounded hover:bg-[#EBE5C2] text-[#504B38] shadow-md">
                <i class="fas fa-folder"></i>
            </a>
            <span class="absolute left-16 ml-2 font-medium bg-[#EBE5C2] text-[#504B38] text-sm px-4 py-2 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50 pointer-events-none">
                Kategori
            </span>
        </li>

        {{-- Komentar --}}
        <li class="group relative flex items-center">
            <a href="#" class="flex justify-center w-full px-4 py-2 rounded hover:bg-[#EBE5C2] text-[#504B38] shadow-md">
                <i class="fas fa-comments"></i>
            </a>
            <span class="absolute left-16 ml-2 border font-medium bg-[#EBE5C2] text-[#504B38] text-sm px-4 py-2 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50 pointer-events-none">
                Komentar
            </span>
        </li>

        {{-- Artikel --}}
        <li class="group relative flex items-center">
            <a href="{{ Route('admin.artikel.index') }}" class="flex justify-center w-full px-4 py-2 rounded hover:bg-[#EBE5C2] text-[#504B38] shadow-md">
                <i class="fas fa-newspaper"></i>
            </a>
            <span class="absolute left-16 ml-2 border font-medium bg-[#EBE5C2] text-[#504B38] text-sm px-4 py-2 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50 pointer-events-none">
                Artikel
            </span>
        </li>

        {{-- User --}}
        <li class="group relative flex items-center">
            <a href="#" class="flex justify-center w-full px-4 py-2 rounded hover:bg-[#EBE5C2] text-[#504B38] shadow-md">
                <i class="fas fa-user"></i>
            </a>
            <span class="absolute left-16 ml-2 border font-medium bg-[#EBE5C2] text-[#504B38] text-sm px-4 py-2 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap z-50 pointer-events-none">
                User
            </span>
        </li>
    </ul>
</aside>