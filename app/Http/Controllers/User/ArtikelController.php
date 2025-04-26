<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::with('user')->get();
        return view('artikel', compact('artikels'));
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel-show', compact('artikel'));
    }
}
