<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('user')->get();
        return view('admin.artikel.index', compact('artikels'));
    }
    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.show', compact('artikel'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'image' => 'nullable|image',
        ]);
        $validated['author'] = Auth::id();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        Artikel::create($validated);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dibuat.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus.');
    }
}
