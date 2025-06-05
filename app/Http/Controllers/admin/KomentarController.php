<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use App\Models\Artikel ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Tampilkan semua komentar
     */
    public function index()
    {
        $komentars = Komentar::with(['user', 'artikel.kategori'])->latest()->paginate(10);
        return view('admin.komentar.index', compact('komentars'));
    }

    /**
     * Simpan komentar baru oleh admin
     */
    public function store(Request $request, $artikelId)
    {
        $request->validate([
            'isi' => 'required|string',
        ]);

        $artikel = Artikel::findOrFail($artikelId);

        Komentar::create([
            'artikel_id' => $artikelId,
            'user_id' => Auth::id(), // pastikan admin juga terautentikasi
            'isi' => $request->isi,
            'kategori_id' => $artikel->kategori_id, // otomatis ambil dari artikel
        ]);

        return back()->with('success', 'komentar udah ditambah Nih!');
    }


    /**
     * Hapus komentar
     */
    public function destroy(Komentar $komentar)
    {
        $komentar->delete();

        return back()->with('success', 'Yeay, Komentar Udah Dihapus!');
    }
}
