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
        $users = User::whereNot('roleuser', 1)->get();
        return view('admin.m-pengguna', [
            'users' => $users,
        ]);
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
