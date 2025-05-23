<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recept;
use Illuminate\Http\Request;

class ReceptController extends Controller
{
    public function index()
    {
        $recepti = Recept::all();
        return view('admin.recepti.index', compact('recepti'));
    }

    public function create()
    {
        return view('admin.recepti.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:100',
            'opis' => 'required|string',
        ]);

        Recept::create($validated);

        return redirect()->route('admin.recepti.index')->with('success', 'Recept je dodat.');
    }

    public function edit(Recept $recept)
    {
        return view('admin.recepti.edit', compact('recept'));
    }

    public function update(Request $request, Recept $recept)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:100',
            'opis' => 'required|string',
        ]);

        $recept->update($validated);

        return redirect()->route('admin.recepti.index')->with('success', 'Recept je ažuriran.');
    }

    public function destroy(Recept $recept)
    {
        $recept->delete();

        return redirect()->route('admin.recepti.index')->with('success', 'Recept je obrisan.');
    }
}
