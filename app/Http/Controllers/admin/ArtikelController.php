<?php

namespace App\Http\Controllers\admin;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::with('kategori');

        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_id', $request->kategori);
        }

        $artikels = $query->paginate(9);

        $kategoriList = Kategori::all();

        return view('admin.artikel.index', compact('artikels', 'kategoriList'));
    }


    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.artikel.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Artikel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori_id,
            'user_id' => Auth::id(), // Jika artikel dikaitkan ke pembuat
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'keren... artikel udah ditambah nih!');
    }

    public function show(Artikel $artikel)
    {
        $artikel->load(['komentars.user']); // relasi komentar dan user-nya
        return view('admin.artikel.show', compact('artikel'));
    }


    public function edit(Artikel $artikel)
    {
        $kategoris = Kategori::all();
        return view('admin.artikel.edit', compact('artikel', 'kategoris'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $artikel->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.artikel.index')->with('success', 'artikel udah diedit nih');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect()->route('admin.artikel.index')->with('success', 'artikelnya udah dihapus nih');
    }
}
