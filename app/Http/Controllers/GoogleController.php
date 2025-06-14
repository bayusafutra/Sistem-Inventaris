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
                    $newUser = User::create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'googleid' => $googleUser->getId(),
                        'email_verified_at' => Carbon::now(),
                        'roleuser' => 2,
                        'isactive' => true,
                    ]);
                    Auth::login($newUser);
                    return redirect()->route('home');
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
            3 => redirect()->route('manager.dashboard'),
            4 => redirect()->route('stgudang.dashboard'),
            5 => redirect()->route('stpenjualan.dashboard'),
            default => redirect()->route('home')->with('error', 'Role tidak dikenali.'),
        };
    }
}
