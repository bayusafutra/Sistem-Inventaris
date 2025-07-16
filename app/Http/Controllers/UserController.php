<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function masterUser()
    {
        $user = Auth::user();
        if (!in_array($user->roleuser, [1])) {
            return $this->redirectBasedOnRole();
        }
        $users = User::whereNot('roleuser', 1)->get();
        return view('admin.m-pengguna', [
            'users' => $users,
        ]);
    }

    private function redirectBasedOnRole()
    {
        $role = auth()->user()->roleuser;
        return match ($role) {
            1 => redirect()->route('admin.dashboard'),
            2 => redirect()->route('home'),
            3 => redirect()->route('manager.dashboard', ['slug' => Auth::user()->toko->slug]),
            4 => redirect()->route('stgudang.dashboard', ['slug' => Auth::user()->toko->slug]),
            5 => redirect()->route('stpenjualan.dashboard', ['slug' => Auth::user()->toko->slug]),
            default => redirect()->route('home')->with('error', 'Role tidak dikenali.'),
        };
    }

    public function nonaktif($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'isactive' => false,
        ]);

        return redirect()->back()->with([
            'message' => 'Status user telah di-NonAktifkan.',
            'showAlert' => true,
        ]);
    }

    public function aktif($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'isactive' => true,
        ]);

        return redirect()->back()->with([
            'message' => 'Status user telah diAktifkan.',
            'showAlert' => true,
        ]);
    }
}
