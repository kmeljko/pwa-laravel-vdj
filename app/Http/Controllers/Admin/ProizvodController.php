<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proizvod;
use Illuminate\Http\Request;

class ProizvodController extends Controller
{
    public function index()
    {
        $proizvodi = Proizvod::all();
        return view('admin.proizvodi.index', compact('proizvodi'));
    }

    public function create()
    {
        return view('admin.proizvodi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:100',
            'grupa' => 'required|string|max:100',
            'istaknuto' => 'required|integer|in:0,1',
        ]);

        Proizvod::create($validated);

        return redirect()->route('admin.proizvodi.index')->with('success', 'Proizvod je dodat.');
    }

    public function edit(Proizvod $proizvod)
    {
        return view('admin.proizvodi.edit', compact('proizvod'));
    }

    public function update(Request $request, Proizvod $proizvod)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:100',
            'grupa' => 'required|string|max:100',
            'istaknuto' => 'required|integer|in:0,1',
        ]);

        $proizvod->update($validated);

        return redirect()->route('admin.proizvodi.index')->with('success', 'Proizvod je izmenjen.');
    }

    public function destroy(Proizvod $proizvod)
    {
        $proizvod->delete();

        return redirect()->route('admin.proizvodi.index')->with('success', 'Proizvod je obrisan.');
    }
}
