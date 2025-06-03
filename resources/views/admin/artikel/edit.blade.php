@extends('admin.layouts.app')

@section('page-title', 'Edit Artikel')
@section('title', 'Blog Farrel | Edit Artikel')
@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-2xl font-semibold text-[#504B38] mb-6">Edit Artikel</h1>

    <!-- Form Edit Artikel -->
    <form method="POST" action="{{ route('admin.artikel.update', $artikel) }}" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div>
            <label for="judul" class="block font-medium text-md text-[#504B38]">Judul Artikel</label>
            <input type="text" name="judul" id="judul"
                   value="{{ old('judul', $artikel->judul) }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#504B38] focus:border-[#504B38]"
                   placeholder="Masukkan judul artikel">
            @error('judul')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Kategori -->
        <div>
            <label for="kategori_id" class="block font-medium text-md text-[#504B38]">Pilih Kategori</label>
            <select name="kategori_id" id="kategori_id"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#504B38] focus:border-[#504B38]">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('kategori_id', $artikel->kategori_id) == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Isi Artikel -->
        <div>
            <label for="isi" class="block font-medium text-md text-[#504B38]">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="10"
                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#504B38] focus:border-[#504B38]"
                      placeholder="Tulis isi artikel di sini...">{{ old('isi', $artikel->isi) }}</textarea>
            @error('isi')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.artikel.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                Batal
            </a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 rounded-md bg-[#504B38] text-white font-medium hover:bg-[#F8F3D9] hover:text-[#504B38] transition-all duration-300">
                Perbarui Artikel
            </button>
        </div>
    </form>
</div>
@endsection