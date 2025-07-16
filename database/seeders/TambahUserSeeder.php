<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TambahUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Testing User',
            'toko_id' => null,
            'panggilan' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'googleid' => null,
            'roleuser' => 2,
            'jk' => true,
            'tgl_lahir' => '2001-07-07',
            'notelp' => '0987262826',
            'gambar' => null,
            'email_verified_at' => now(),
            'isactive' => true,
        ]);
    }
}
