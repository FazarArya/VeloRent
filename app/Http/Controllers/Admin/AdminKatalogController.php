<?php

namespace App\Http\Controllers\Admin;

use App\Models\Katalog;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class AdminKatalogController extends Controller
{
    public function index()
    {
        $katalogs = Katalog::with('kategori')->get(); // Ambil data katalog beserta kategori
        return view('admin.katalog', compact('katalogs'));
    }

    public function create()
    {
        $kategoris = Kategori::all(); // Ambil data kategori
        return view('admin.katalogs.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'image|nullable',
            'jenis_kendaraan' => 'required|string|max:255',
            'nama_kendaraan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_sewa' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $gambarPath = $request->file('gambar') ? $request->file('gambar')->store('katalogs', 'public') : null;

        Katalog::create([
            'gambar' => $gambarPath,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'nama_kendaraan' => $request->nama_kendaraan,
            'deskripsi' => $request->deskripsi,
            'harga_sewa' => $request->harga_sewa,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('admin.katalog')->with('success', 'Katalog berhasil ditambahkan');
    }

    public function edit($id)
    {
        $katalog = Katalog::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.katalogs.edit', compact('katalog', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'gambar' => 'image|nullable',
            'jenis_kendaraan' => 'required|string|max:255',
            'nama_kendaraan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga_sewa' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $katalog = Katalog::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($katalog->gambar) {
                Storage::disk('public')->delete($katalog->gambar);
            }
            $katalog->gambar = $request->file('gambar')->store('katalogs', 'public');
        }

        $katalog->update($request->only('jenis_kendaraan', 'nama_kendaraan', 'deskripsi', 'harga_sewa', 'kategori_id'));

        return redirect()->route('admin.katalog')->with('success', 'Katalog berhasil diperbarui');
    }

    public function destroy($id)
    {
        $katalog = Katalog::findOrFail($id);

        if ($katalog->gambar) {
            Storage::disk('public')->delete($katalog->gambar);
        }

        $katalog->delete();

        return redirect()->route('admin.katalog')->with('success', 'Katalog berhasil dihapus');
    }

    public function userView(Request $request)
    {
        $query = \App\Models\Katalog::with('kategori');

        // Filter berdasarkan kategori
        if ($request->has('kategori')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('nama', $request->kategori);
            });
        }

        $katalogs = $query->get(); // Ambil data sesuai filter
        return view('katalog', compact('katalogs'));
    }


}
