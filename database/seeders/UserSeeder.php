<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Cek apakah admin sudah ada (hindari duplikat)
        $adminExists = User::where('roleuser', 1)->exists();
        if (!$adminExists) {
            User::create([
                'name' => 'Admin TeknoLogis',
                'panggilan' => 'Admin',
                'email' => 'syahbayu17@gmail.com',
                'password' => Hash::make('kelekmambu86'),
                'googleid' => null,
                'roleuser' => 1,
                'jk' => true,
                'tgl_lahir' => null,
                'notelp' => null,
                'gambar' => null,
                'email_verified_at' => now(),
                'isactive' => true,
            ]);
        }
    }
}
