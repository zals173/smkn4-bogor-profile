<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Hanya membuat admin jika belum ada. Admin yang sudah ada tidak diubah.
        // Password di bawah cuma bawaan awal: WAJIB diganti lewat halaman Profil setelah login pertama.
        User::firstOrCreate(
            ['email' => 'admin@smkn4bogor.sch.id'],
            [
                'name' => 'Admin SMKN 4 Bogor',
                'password' => Hash::make('GantiPasswordIni!2026'),
            ]
        );
    }
}