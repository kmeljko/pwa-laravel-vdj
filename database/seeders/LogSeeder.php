<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Log;

class LogSeeder extends Seeder
{
    public function run()
    {
        $logovi = [
            ['naziv' => 'Pravljenje testa za hleb', 'opis' => 'Mešanje sastojaka i dizanje testa.', 'po_receptu' => 1],
            ['naziv' => 'Formiranje hleba', 'opis' => 'Oblikovanje testa u vekne.', 'po_receptu' => 1],
            ['naziv' => 'Pravljenje testa za picu', 'opis' => 'Mešanje i odmaranje testa.', 'po_receptu' => 2],
            ['naziv' => 'Priprema testa za kifle', 'opis' => 'Mešanje i prvi rast u kalupima.', 'po_receptu' => 3],
            ['naziv' => 'Pravljenje testa za djevrek', 'opis' => 'Mešanje i oblikovanje djevreka.', 'po_receptu' => 5],
        ];

        foreach ($logovi as $log) {
            Log::create($log);
        }
    }
}
