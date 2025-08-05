<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('googleid', $googleUser->getId())->first();
            if ($user) {
                Auth::login($user);
            } else {
                $existingUser = User::where('email', $googleUser->getEmail())->first();
                if ($existingUser) {
                    $existingUser->update(['googleid' => $googleUser->getId()]);
                    Auth::login($existingUser);
                } else {
                    return redirect()->route('login')->with('error', [
                        'message' => 'Akun email Anda belum terdaftar.',
                        'type' => 'error'
                    ]);
                }
            }
            return $this->redirectBasedOnRole();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat login dengan Google. Pastikan koneksi internet stabil.');
        }
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
}
