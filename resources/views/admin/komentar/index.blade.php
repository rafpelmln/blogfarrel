@extends('admin.layouts.app')

@section('page-title', 'Komentar')
@section('title', 'Blog Farrel | Komentar')

@section('content')
<div class="px-4 py-6 max-w-7xl mx-auto">
    <div class="bg-[#EBE5C2] p-4 sm:p-6 rounded-lg shadow-md">
        <h3 class="text-lg sm:text-2xl font-semibold text-[#3d3928] mb-6">Daftar Komentar</h3>

        <!-- Daftar Komentar Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @forelse ($komentars as $komentar)
                <div class="p-4 sm:p-5 bg-[#B9B28A] rounded-xl shadow-md group relative flex flex-col justify-between">
                    <!-- Header: Nama + Tombol -->
                    <div class="flex justify-between items-start mb-3" x-data="{ open: false }">
                        <strong class="text-[#504B38] text-sm sm:text-base">{{ $komentar->user->name ?? 'Admin' }}</strong>

                        <!-- Tombol titik tiga -->
                        <div class="relative">
                            <button @click="open = !open" class="text-[#504B38] p-1 rounded-full hover:bg-[#EBE5C2] transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <circle cx="12" cy="5" r="1.5"/>
                                    <circle cx="12" cy="12" r="1.5"/>
                                    <circle cx="12" cy="19" r="1.5"/>
                                </svg>
                            </button>

                            <!-- Dropdown Hapus -->
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-28 bg-[#F8F3D9] rounded-xl shadow z-50">
                                <form action="{{ route('admin.artikel.komentar.destroy', $komentar->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block w-full text-center py-2 text-red-500 font-medium hover:rounded-xl hover:bg-red-500 hover:text-[#F8F3D9] transition-colors">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Komentar -->
                    <div class="mb-2 text-sm text-[#55513f] space-y-1">
                        <p><span class="font-medium">Artikel:</span> <span class="italic">{{ optional($komentar->artikel)->judul ?? 'Artikel tidak ditemukan' }}</span></p>
                        <p><span class="font-medium">Kategori:</span> <span class="italic">{{ optional(optional($komentar->artikel)->kategori)->nama_kategori ?? 'Tanpa Kategori' }}</span></p>
                    </div>

                    <!-- Isi Komentar -->
                    <p class="text-[#55513f] text-sm mb-4 whitespace-pre-line break-words">{{ $komentar->isi }}</p>

                    <!-- Waktu -->
                    <p class="text-[#55513f] text-right text-xs italic">
                        Dibuat: {{ $komentar->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }}
                    </p>
                </div>
            @empty
                <p class="italic text-gray-600 text-center col-span-2">Belum ada komentar.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $komentars->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</div>
@endsection
