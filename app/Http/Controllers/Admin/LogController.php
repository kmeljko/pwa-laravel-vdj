<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Recept;
use Illuminate\Http\Request;

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
        ]);

        Log::create($validated);

        return redirect()->route('admin.logovi.index')->with('success', 'Log uspešno dodat.');
    }

    public function update(Request $request, Log $log)
    {
        $validated = $request->validate([
            'naziv' => 'required|string|max:255',
            'po_receptu' => 'required|exists:recepti,id',
            'opis' => 'nullable|string|max:1000',
        ]);

        $log->update($validated);

        return redirect()->route('admin.logovi.index')->with('success', 'Log uspešno izmenjen.');
    }


    public function show(Log $log)
    {
        return view('admin.logovi.show', compact('log'));
    }

    public function edit(Log $log)
    {
        $recepti = Recept::all();
        return view('admin.logovi.edit', compact('log', 'recepti'));
    }

    public function destroy(Log $log)
    {
        $log->delete();
        return redirect()->route('admin.logovi.index')->with('success', 'Log uspešno obrisan.');
    }

}
