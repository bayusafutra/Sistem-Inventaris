<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->isactive) {
                return $this->redirectBasedOnRole();
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('error', [
                    'message' => 'Akun Anda belum terverifikasi. Silakan cek email untuk verifikasi.',
                    'type' => 'warning'
                ]);
            }
        }

        return back()->with('error', [
            'message' => 'Login gagal! Periksa email dan password Anda.',
            'type' => 'error'
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

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = Str::uuid()->toString();
        \DB::table('email_verifications')->insert([
            'user_id' => $user->id,
            'token' => $token,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Mail::to($user->email)->send(new VerificationEmail($user, $token));
        return redirect()->route('login')->with('register', [
            'message' => 'Silakan cek email untuk verifikasi akun Anda.',
            'type' => 'info'
        ]);
    }

    public function verifyEmail(Request $request)
    {
        $token = $request->query('token');
        $verification = \DB::table('email_verifications')->where('token', $token)->first();

        if ($verification) {
            $user = User::find($verification->user_id);
            if ($user) {
                $user->update([
                    'isactive' => true,
                    'email_verified_at' => now(),
                ]);
                \DB::table('email_verifications')->where('token', $token)->delete();
                return redirect()->route('login')->with('verif', [
                    'message' => 'Akun berhasil terverifikasi, silakan login.',
                    'type' => 'success'
                ]);
            }
        }

        return redirect()->route('login')->with('error', [
            'message' => 'Token verifikasi tidak valid.',
            'type' => 'error'
        ]);
    }

    public function showForgotPasswordForm()
    {
        return view('auth.passwords.forgot');
    }

    public function forgotPassword(Request $request)
    {
        // $request->validate(['email' => 'required|email|exists:users,email']);
        $user = User::where('email', $request->email)->where('isactive', true)->first();

        if ($user) {
            $token = Str::uuid()->toString();
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Mail::to($user->email)->send(new ResetPasswordEmail($user, $token));
        }else {
            return redirect()->route('lupa-password')->with('error', [
                'message' => 'Email tidak ditemukan pada sistem',
                'type' => 'erorr'
            ]);
        }

        return redirect()->route('login')->with('reset', [
            'message' => 'Silahkan cek email untuk reset password',
            'type' => 'info'
        ]);
    }

    public function showResetPasswordForm(Request $request)
    {
        $token = $request->query('token');
        $reset = DB::table('password_resets')->where('token', $token)->first();

        if (!$reset) {
            return redirect()->route('login')->with([
                'message' => 'Token reset tidak valid.',
                'type' => 'error'
            ]);
        }

        return view('auth.passwords.reset')->with(['token' => $token, 'reset' => $reset]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $reset = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Token reset tidak valid.']);
        }

        $user = User::where('email', $request->email)->where('isactive', true)->first();
        if ($user) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
            DB::table('password_resets')->where('email', $request->email)->delete();
        }

        return redirect()->route('login')->with('reset-success', [
            'message' => 'Password berhasil direset. Silakan login dengan password baru.',
            'type' => 'success'
        ]);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validationRules = [
            'password' => 'required|min:6|confirmed',
        ];

        if (!is_null($user->password)) {
            $validationRules['current_password'] = 'required';
        }

        $request->validate($validationRules, [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password baru minimal 6 karakter.',
            'password.confirmed' => 'Password baru dan konfirmasi tidak sesuai.',
        ]);

        if (!is_null($user->password) && !Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors([
                'current_password' => 'Password saat ini salah.',
            ])->with('showAlert', true);
        }

        // Update password
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        $message = is_null($user->password) ? 'Password akun Anda berhasil dibuat.' : 'Password berhasil diubah.';
        return redirect()->back()->with([
            'message' => $message,
            'type' => 'success',
            'showAlert' => true,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
