@extends('admin.layouts.app')

@section('page-title', 'Artikel')
@section('title', 'Blog Farrel | Artikel Selengkapnya')

@section('content')
<div class="flex flex-col gap-6 p-6">

    <!-- Judul Artikel -->
    <div class="bg-[#EBE5C2] p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-[#3d3928] mb-4">{{ $artikel->judul }}</h1>
        <p class="text-[#55513f] mb-6">{!! nl2br(e($artikel->isi)) !!}</p>

        <div class="text-sm text-[#6b6654] italic">
            Dibuat: {{ $artikel->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} <br>
            Terakhir diupdate: {{ $artikel->updated_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }}
        </div>
    </div>
    
    <div class="flex flex-row gap-6">
        <!-- Komentar -->
        <div class="bg-[#EBE5C2] p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-[#3d3928] mb-4">Komentar</h3>
            @forelse ($artikel->komentars as $komentar)
                <div class="mb-4 p-5  bg-[#B9B28A] rounded-xl shadow-md">
                    <div class="flex justify-between items-center mb-1" x-data="{ open: false }">
                        <strong class="text-[#504B38]">{{ $komentar->user->username ?? 'Seseorang' }}</strong>
    
                        <!-- Tombol titik tiga -->
                        <div class="relative">
                            <button @click="open = !open" class="text-[#504B38] px-3 py-1 rounded-full hover:bg-[#EBE5C2]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <circle cx="12" cy="5" r="1.5"/>
                                    <circle cx="12" cy="12" r="1.5"/>
                                    <circle cx="12" cy="19" r="1.5"/>
                                </svg>
                            </button>
    
                            <!-- Dropdown -->
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-28 bg-[#F8F3D9] rounded-xl shadow z-50">
                                <form action="{{ route('admin.artikel.komentar.destroy', $komentar->id) }}" method="POST" onsubmit="return confirm('Hapus komentar?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="block w-full text-center py-2 text-red-500 font-medium hover:rounded-xl hover:bg-red-500 hover:text-[#F8F3D9]">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
    
                    <p class="text-[#55513f]">{{ $komentar->isi }}</p>
                    <p class="text-[#55513f] pt-3 text-end text-sm italic">
                            Dibuat: {{ $komentar->created_at->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} <br>
                    </p>
                </div>
            @empty
                <p class="text-gray-600 italic">Belum ada komentar.</p>
            @endforelse
        </div>

        <!-- Form Tambah Komentar -->
        <div class="bg-[#EBE5C2] w-1/2 p-6 rounded-lg shadow-md h-full">
            <h4 class="text-lg font-semibold text-[#3d3928] mb-3">Tambah Komentar</h4>
            <form action="{{ route('admin.artikel.komentar.store', $artikel->id) }}" method="POST" class="space-y-4">
                @csrf
                <textarea name="isi" rows="4" required
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#504B38] resize-none"
                    placeholder="Tulis komentar di sini..."></textarea>
                <button type="submit"
                    class="bg-[#504B38] text-[#F8F3D9] px-5 py-2 rounded-lg hover:bg-[#3d3928] transition-all duration-300">
                    Kirim Komentar
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
