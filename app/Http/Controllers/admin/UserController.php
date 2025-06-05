<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Buat nampilin ke halaman users
    public function index () {
        $users = User::latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function update (Request $request, User $user) {
        $request->validate([
            'username'=>'required',
            'email'=>'required|email',
            'role'=>'required|in:admin,user',
        ]);

        $user->update($request->only(['username', 'email', 'role']));
        return redirect()->route('admin.user.index')->with('succes', 'user udah diupdate nih!');
    }

    public function destroy (User $user) {
        $user->delete();
        return redirect()->route('admin.user.index')->with('succes', 'user udah dihapus nih');
    }
}
