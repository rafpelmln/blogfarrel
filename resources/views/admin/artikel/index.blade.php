@extends('admin.layouts.app')

@section('page-title', 'Artikel')
@section('title', 'Blog Farrel | Artikel')
@section('content')
<div class="flex flex-col gap-6 p-6 no-scrollbar">
    {{-- <h1 class="text-3xl font-medium text-center text-[#504B38]">Artikel</h1> --}}

    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($artikels as $artikel)
            <div class="group rounded-lg overflow-hidden shadow-md hover:shadow-lg hover:scale-105 hover:-translate-4 transition-all duration-300 bg-[#EBE5C2] relative">
                
                <!-- Tombol Edit + Delete - Muncul saat hover  card -->
                <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity z-10 flex gap-2">
                    <!-- Tombol Edit -->
                    <a href="{{ route('admin.artikel.edit', $artikel) }}" 
                    class="bg-[#F8F3D9] w-9 h-9 aspect-square flex items-center justify-center rounded-full shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#504B38]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST" 
                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?')" 
                        class="w-9 h-9 aspect-square flex items-center justify-center rounded-full bg-[#F8F3D9] shadow-md hover:shadow-lg">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full h-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>


                <!-- Konten Card -->
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-[#3d3928] mb-2">{{ $artikel->judul }}</h2>
                    <p class="text-[#55513f] mb-1 text-sm italic">
                        Dibuat: {{ $artikel->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} <br>
                        Terakhir Update: {{ $artikel->updated_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }}
                    </p>
                    <p class="text-[#55513f] mb-4 line-clamp-3">
                        {{ Str::limit(strip_tags($artikel->isi), 100) }}
                    </p>
                    <a href="#" class="text-[#464131] hover:underline font-medium inline-block mt-2">
                        Lihat Selengkapnya →
                    </a>
                </div>

            </div>
        @endforeach

    </div>
    <!-- Pagination -->
    <div class=" flex justify-center">
        {{ $artikels->links('vendor.pagination.tailwind') }}
    </div>

    <!-- Tombol Tambah Artikel -->
    <div class="fixed bottom-10 right-10 z-50 hover:scale-105">
        <a href="{{ route('admin.artikel.create') }}" 
           class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-[#504B38] text-[#F8F3D9] font-medium shadow-lg hover:bg-[#F8F3D9] hover:text-[#504B38] hover:border hover:border-[#504B38] transition-all duration-300">
            Bikin Artikel
        </a>
    </div>
</div>
@endsection

{{-- @extends('admin.layouts.app')

@section('page-title', 'Artikel')
@section('title', 'Blog Farrel | Artikel')
@section('content')
<div class="flex flex-col gap-6 p-6">
    <h1 class="text-3xl font-medium text-center text-[#504B38]">Artikel</h1>

    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($artikels as $artikel)
            <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow bg-white">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $artikel->judul }}</h2>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ strip_tags($artikel->isi) }}
                    </p>
                    <a href="{{ route('admin.artikel.show', $artikel->id) }}" class="text-blue-600 hover:underline font-medium inline-block mt-2">
                        Lihat Selengkapnya →
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection --}}