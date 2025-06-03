@extends('admin.layouts.app')

@section('page-title', 'Kategori')
@section('title', 'Blog Farrel | Kategori')
@section('content')
<div class="p-6 max-w-4xl mx-auto">

    <!-- Grid Kategori -->
    <div class="space-y-4">
        @forelse ($kategoris as $kategori)
            <div x-data="{ editOpen: false }" class="group rounded-lg p-4 flex justify-between items-center bg-[#EBE5C2] shadow-sm hover:shadow-md transition-shadow duration-200 relative mb-6">
                <div>
                    <h2 class="text-lg font-medium text-[#504B38]">{{ $kategori->nama_kategori }}</h2>
                    <p class="text-sm text-gray-500">ID: {{ $loop->iteration }}</p>
                </div>

                <div class="flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                    <!-- Tombol Edit -->
                    <button @click="editOpen = true" type="button"
                        class="p-2 rounded-full bg-[#504B38] text-[#EBE5C2] hover:bg-[#F8F3D9] hover:text-[#3d3928] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>
                    <form action="{{ route('admin.kategori.destroy', $kategori) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M10 14v6m4-6v6" />
                            </svg>
                        </button>
                    </form>
                </div>

                <!-- Modal Edit -->
                <div x-show="editOpen" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/30">
                    <div @click.away="editOpen = false" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                        <h2 class="text-xl font-semibold text-[#504B38] mb-4">Edit Kategori</h2>
                        <form method="POST" action="{{ route('admin.kategori.update', $kategori->id) }}" class="space-y-4">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="edit_nama_kategori_{{ $kategori->id }}" class="block font-medium text-md text-[#504B38]">Nama Kategori</label>
                                <input type="text" name="nama_kategori" id="edit_nama_kategori_{{ $kategori->id }}"
                                    value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#504B38] focus:border-[#504B38]"
                                    required>
                            </div>
                            <div class="flex justify-end space-x-4 pt-2">
                                <button type="button" @click="editOpen = false"
                                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 rounded-md bg-[#504B38] text-white font-medium hover:bg-[#F8F3D9] hover:text-[#504B38] transition-all duration-300">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Badge Jumlah Artikel -->
                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-full  opacity-0 group-hover:opacity-100 group-hover:translate-y-1 transition-all duration-300 pointer-events-none">
                    <span class="px-4 py-2 bg-[#504B38] text-white text-sm rounded-full shadow-md">
                        {{ $kategori->artikels_count }} Artikel Telah Dibuat.
                    </span>
                </div>
            </div>
        @empty
            <div class="text-center py-6 text-gray-500">
                Belum ada kategori. Yuk tambah kategori baru!
            </div>
        @endforelse
    </div>

    <!-- Tombol Tambah Kategori -->
    <div x-data="{ open: false }" class="fixed bottom-10 right-10 z-50">
        <button @click="open = true"
            class="inline-flex items-center justify-center px-5 py-3 rounded-full bg-[#504B38] text-[#F8F3D9] font-medium shadow-lg hover:bg-[#F8F3D9] hover:text-[#504B38] hover:border hover:border-[#504B38] transition-all duration-300">
            Bikin Kategori
        </button>

        <!-- Modal Create -->
        <div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/20">
            <div @click.away="open = false" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-xl font-semibold text-[#504B38] mb-4">Buat Kategori Baru</h2>
                <form method="POST" action="{{ route('admin.kategori.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nama_kategori" class="block font-medium text-md text-[#504B38]">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#504B38] focus:border-[#504B38]"
                            placeholder="Contoh: Teknologi, Lifestyle, dll." required>
                        @error('nama_kategori')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end space-x-4 pt-2">
                        <button type="button" @click="open = false"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 rounded-md bg-[#504B38] text-white font-medium hover:bg-[#F8F3D9] hover:text-[#504B38] transition-all duration-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
