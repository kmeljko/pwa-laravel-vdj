<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recept;

class ReceptSeeder extends Seeder
{
    public function run()
    {
        $recepti = [
            ['naziv' => 'Testo za hleb', 'opis' => 'Klasično testo za hleb sa kvascem i brašnom.'],
            ['naziv' => 'Testo za picu', 'opis' => 'Elastično testo pogodno za tanku picu.'],
            ['naziv' => 'Testo za kifle', 'opis' => 'Mekano i raskošno testo za kifle.'],
            ['naziv' => 'Testo za pitu', 'opis' => 'Testo za pite sa hrskavom koricom.'],
            ['naziv' => 'Testo za djevrek', 'opis' => 'Testo za tradicionalni djevrek sa susamom.'],
        ];

        foreach ($recepti as $recept) {
            Recept::create($recept);
        }
    }
}
