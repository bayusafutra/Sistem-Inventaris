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
            'name' => 'David Dasilva',
            'toko_id' => 1,
            'panggilan' => 'David',
            'email' => 'davidasilva@gmail.com',
            'password' => Hash::make('password'),
            'googleid' => null,
            'roleuser' => 5,
            'jk' => true,
            'tgl_lahir' => '2002-05-03',
            'notelp' => '08123456789',
            'gambar' => null,
            'email_verified_at' => now(),
            'isactive' => true,
        ]);
    }
}
