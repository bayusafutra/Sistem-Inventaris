<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\StaffVerificationEmail;

class ManagerController extends Controller
{
    public function masterStaff($slug)
    {
        $user = Auth::user();
        if (!$user->toko_id) {
            return $this->redirectBasedOnRole();
        }
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return $this->redirectBasedOnRole();
        }
        $staff = $user->toko->user()->where('roleuser', 4)->orWhere('roleuser', 5)->get();
        return view('toko.manager.staff', [
            'toko' => $toko,
            'staff' => $staff,
        ]);
    }

    private function redirectBasedOnRole()
    {
        $role = auth()->user()->roleuser;
        return match ($role) {
            1 => redirect()->route('admin.dashboard'),
            2 => redirect()->route('home'),
            3 => redirect()->route('manager.dashboard'),
            4 => redirect()->route('stgudang.dashboard'),
            5 => redirect()->route('stpenjualan.dashboard'),
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
            'message' => 'Status staff telah di-NonAktifkan.',
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
            'message' => 'Status staff telah diAktifkan.',
            'showAlert' => true,
        ]);
    }

    public function storeStaff(Request $request, $slug)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return redirect()->route('manager.master-staff', $toko->slug)->with('message', 'Slug tidak sesuai.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'notelp' => 'required|string|max:255',
            'jk' => 'required|boolean',
            'tgl_lahir' => 'required|date',
            'roleuser' => 'required|in:4,5',
        ]);
        try {
            $newUser = User::create([
                'toko_id' => $toko->id,
                'name' => $request->name,
                'email' => $request->email,
                'notelp' => $request->notelp,
                'jk' => $request->jk,
                'tgl_lahir' => $request->tgl_lahir,
                'roleuser' => $request->roleuser,
                'password' => bcrypt('technologis'),
                'verification_token' => Str::random(60),
            ]);
            Mail::to($request->email)->send(new StaffVerificationEmail($newUser));
            return redirect()->route('manager.master-staff', $toko->slug)->with([
                'message' => 'Staff berhasil ditambahkan. Email verifikasi telah dikirim.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('manager.master-staff', $toko->slug)->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan staff.',
            ])->with('showAlert', true);
        }
    }

    public function verifyStaff($token)
    {
        $user = User::where('verification_token', $token)->first();
        if (!$user) {
            return redirect()->route('login')->with('error', [
                'message' => 'Token verifikasi tidak valid.',
                'type' => 'error'
            ]);
        }
        $user->update([
            'isactive' => true,
            'email_verified_at' => now(),
            'verification_token' => null,
        ]);
        return redirect()->route('login')->with('verif-staff', [
            'message' => 'Akun Anda telah diaktifkan. Silakan masuk.',
            'type' => 'info'
        ]);
    }
}
