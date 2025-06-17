<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function editprofile(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'panggilan' => 'string|max:255',
            'notelp' => 'string|max:255',
            'jk' => 'boolean',
            'tgl_lahir' => 'date',
            'gambar' => 'nullable|image|max:2048',
        ]);

        try {
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($user->gambar) {
                    if (Storage::disk('public')->exists($user->gambar)) {
                        Storage::disk('public')->delete($user->gambar);
                    }
                }
                // Simpan gambar baru
                $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
                $path = 'foto-profile/' . $fileName;
                $request->file('gambar')->storeAs('foto-profile', $fileName, 'public');
                $data['gambar'] = $path;
            }

            $user->update($data);

            return redirect()->back()->with([
                'message' => 'Profil berhasil diperbarui',
                'type' => 'success',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'general' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ])->with('showAlert', true);
        }
    }
}
