<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nama' => 'PMR', 'icon' => 'cross'],
            ['nama' => 'Paskibra', 'icon' => 'flag'],
            ['nama' => 'Pramuka', 'icon' => 'compass'],
            ['nama' => 'Paduan Suara', 'icon' => 'note'],
            ['nama' => 'Basket', 'icon' => 'ball'],
            ['nama' => 'Voli', 'icon' => 'ball'],
            ['nama' => 'Rohis', 'icon' => 'book'],
            ['nama' => 'Futsal', 'icon' => 'ball'],
            ['nama' => 'Silat', 'icon' => 'shield'],
            ['nama' => 'Band', 'icon' => 'note'],
        ];

        foreach ($data as $item) {
            Ekstrakurikuler::updateOrCreate(
                ['nama' => $item['nama']],
                ['icon' => $item['icon']]
            );
        }
    }
}