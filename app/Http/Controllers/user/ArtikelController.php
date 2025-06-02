<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        // Ambil semua artikel terbaru dengan relasi kategori & komentar
        $artikels = Artikel::with(['kategori', 'komentar.user'])->latest()->get();
        return view('user.artikel.index', compact('artikels'));
    }

    public function show($id)
    {
        // Ambil detail artikel + komentar-komentarnya
        $artikel = Artikel::with(['kategori', 'komentar.user'])->findOrFail($id);
        return view('user.artikel.show', compact('artikel'));
    }
}
