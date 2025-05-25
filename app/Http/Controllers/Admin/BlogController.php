<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Prikaz liste svih blogova
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    // Forma za kreiranje novog bloga
    public function create()
    {
        return view('admin.blogs.create');
    }

    // Čuvanje novog bloga u bazi
    public function store(Request $request)
    {
        $validated = $request->validate([
            'naslov' => 'required|string|max:255',
            'sadrzaj' => 'required|string',
        ]);

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog uspešno dodat.');
    }

    // Forma za izmenu postojećeg bloga
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    // Ažuriranje postojećeg bloga
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'naslov' => 'required|string|max:255',
            'sadrzaj' => 'required|string',
        ]);

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog uspešno izmenjen.');
    }

    // Brisanje bloga
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog uspešno obrisan.');
    }
}
