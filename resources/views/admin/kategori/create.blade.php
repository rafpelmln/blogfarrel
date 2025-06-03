{{-- @extends('admin.layouts.app')

@section('page-title', 'Buat Kategori')
@section('title', 'Blog Farrel | Buat Kategori')
@section('content')
<div class="p-6 max-w-md mx-auto bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-[#504B38] mb-6">Buat Kategori Baru</h1>

    <!-- Form Tambah Kategori -->
    <form method="POST" action="{{ route('admin.kategori.store') }}" class="space-y-6">
        @csrf

        <!-- Nama Kategori -->
        <div>
            <label for="nama_kategori" class="block font-medium text-md text-[#504B38]">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#504B38] focus:border-[#504B38]"
                   placeholder="Contoh: Teknologi, Lifestyle, dll." required>
            @error('nama_kategori')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.kategori.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                Batal
            </a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-md bg-[#504B38] text-white font-medium hover:bg-[#F8F3D9] hover:text-[#504B38] transition-all duration-300">
                Simpan Kategori
            </button>
        </div>
    </form>
</div>
@endsection --}}

{{--                                                         I      NI GAKEPAKE                                                                                     --}}