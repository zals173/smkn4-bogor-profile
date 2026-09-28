<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            JurusanSeeder::class,
            ArtikelSeeder::class,
            GaleriSeeder::class,
            ProdukSeeder::class,
            EkstrakurikulerSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}