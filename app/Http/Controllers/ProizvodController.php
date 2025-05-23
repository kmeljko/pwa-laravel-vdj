<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use Illuminate\Http\Request;

class ProizvodController extends Controller
{
    // Prikaz liste proizvoda za javni deo sajta
    public function index()
    {
        // Možeš da prikažeš sve proizvode ili samo istaknute
        $proizvodi = Proizvod::all();

        // ili samo istaknute ako želiš:
        // $proizvodi = Proizvod::where('istaknuto', 1)->get();

        return view('proizvodi.index', compact('proizvodi'));
    }

    // Prikaz detalja pojedinačnog proizvoda
    public function show($id)
    {
        $proizvod = Proizvod::findOrFail($id);

        return view('proizvodi.show', compact('proizvod'));
    }
}
