<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Tampilkan semua komentar
     */
    public function index()
    {
        $komentars = Komentar::with(['user', 'artikel'])->latest()->get();
        return view('admin.komentar.index', compact('komentars'));
    }

    /**
     * Simpan komentar baru oleh admin
     */
    public function store(Request $request)
    {
        $request->validate([
            'artikel_id' => 'required|exists:artikels,id',
            'isi' => 'required|string',
        ]);

        Komentar::create([
            'artikel_id' => $request->artikel_id,
            'user_id' => Auth::id(),
            'isi' => $request->isi,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    /**
     * Hapus komentar
     */
    public function destroy(Komentar $komentar)
    {
        $komentar->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
