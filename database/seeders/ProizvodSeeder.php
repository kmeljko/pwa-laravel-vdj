<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proizvod;

class ProizvodSeeder extends Seeder
{
    public function run()
    {
        $proizvodi = [
            ['naziv' => 'Djevrek', 'grupa' => 'Kifle i peciva', 'istaknuto' => true],
            ['naziv' => 'Kifle sa sirom', 'grupa' => 'Kifle i peciva', 'istaknuto' => true],
            ['naziv' => 'Pita od mesa', 'grupa' => 'Pite', 'istaknuto' => false],
            ['naziv' => 'Pita od krompira', 'grupa' => 'Pite', 'istaknuto' => false],
            ['naziv' => 'Kifla sa makom', 'grupa' => 'Kifle i peciva', 'istaknuto' => false],
        ];

        foreach ($proizvodi as $proizvod) {
            Proizvod::create($proizvod);
        }
    }
}
