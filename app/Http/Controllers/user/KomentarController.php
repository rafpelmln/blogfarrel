<?php

namespace App\Http\Controllers\user;

use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request, $artikelId)
    {
        $request->validate([
            'isi' => 'required|string',
        ]);

        Komentar::create([
            'artikel_id' => $artikelId,
            'user_id' => Auth::id(),
            'isi' => $request->isi,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $komentar = Komentar::findOrFail($id);

        if ($komentar->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus komentar orang lain.');
        }

        $komentar->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
