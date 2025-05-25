<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Recept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('recept')->paginate(15);
        return view('admin.logovi.index', compact('logs'));
    }

    public function create()
    {
        $recepti = Recept::all();
        return view('admin.logovi.create', compact('recepti'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'po_receptu' => 'required|exists:recepti,id',
            'opis' => 'nullable|string|max:1000',
            'slika' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('slika')) {
            $validated['slika'] = $request->file('slika')->store('logovi', 'public');
        }

        Log::create($validated);

        return redirect()->route('admin.logovi.index')->with('success', 'Log uspešno dodat.');
    }

    public function edit(Log $logovi)
    {
        $recepti = Recept::all();
        return view('admin.logovi.edit', ['log' => $logovi, 'recepti' => $recepti]);
    }

    public function update(Request $request, Log $logovi)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'po_receptu' => 'required|exists:recepti,id',
            'opis' => 'nullable|string|max:1000',
            'slika' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('slika')) {
            // Obriši staru sliku ako postoji
            if ($logovi->slika) {
                Storage::disk('public')->delete($logovi->slika);
            }
            $validated['slika'] = $request->file('slika')->store('logovi', 'public');
        }

        $logovi->update($validated);

        return redirect()->route('admin.logovi.index')->with('success', 'Log uspešno izmenjen.');
    }

    public function show(Log $log)
    {
        return view('admin.logovi.show', compact('log'));
    }

    public function destroy(Log $logovi)
    {
        if ($logovi->slika) {
            Storage::disk('public')->delete($logovi->slika);
        }
        $logovi->delete();
        return redirect()->route('admin.logovi.index')->with('success', 'Log uspešno obrisan.');
    }
}
