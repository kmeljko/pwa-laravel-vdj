<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;

class PublicController extends Controller
{
    public function index()
    {
        // Dohvati proizvode gde je istaknuto = 1
        $istaknutiProizvodi = Proizvod::where('istaknuto', 1)->get();

        return view('public.pocetna', compact('istaknutiProizvodi'));
    }

    public function kontakt()
    {
        return view('public.kontakt');
    }
}
