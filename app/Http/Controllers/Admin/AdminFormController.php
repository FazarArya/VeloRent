<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Kategori;
use App\Models\Katalog;

class AdminFormController extends Controller
{
    /**
     * Menampilkan halaman utama admin dengan statistik dan daftar pesanan
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Menghitung statistik pesanan
        $stats = [
            'total' => Pesanan::count(), // Total semua pesanan
            'pending' => Pesanan::where('status', 'pending')->count(), // Total pesanan pending
            'approved' => Pesanan::where('status', 'approved')->count(), // Total pesanan disetujui
            'rejected' => Pesanan::where('status', 'rejected')->count(), // Total pesanan ditolak
        ];

        // Mengambil data pesanan dengan pagination
        $pesanan = Pesanan::latest()->paginate(10);

        return view('admin.form', compact('pesanan', 'stats'));
    }

    /**
     * Menampilkan detail pesanan
     *
     * @param \App\Models\Pesanan $pesanan
     * @return \Illuminate\View\View
     */
    public function show(Pesanan $pesanan)
    {
        // Eager loading relasi katalog dan kategori
        $pesanan->load('katalog.kategori');
        return view('admin.form.show', compact('pesanan'));
    }

    /**
     * Menampilkan form edit pesanan
     *
     * @param \App\Models\Pesanan $pesanan
     * @return \Illuminate\View\View
     */
    public function edit(Pesanan $pesanan)
    {
        // Mengambil semua data kategori dan katalog untuk dropdown
        $kategoris = Kategori::all();
        $katalogs = Katalog::all();
        return view('admin.form.edit', compact('pesanan', 'kategoris', 'katalogs'));
    }

    /**
     * Menyimpan perubahan data pesanan
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pesanan $pesanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255', // Nama wajib diisi, string, max 255 karakter
            'email' => 'required|email', // Email wajib diisi dan format email valid
            'no_hp' => 'required|string', // No HP wajib diisi
            'katalog_id' => 'required|exists:katalogs,id', // Katalog wajib diisi dan harus ada di database
            'status' => 'required|in:pending,approved,rejected' // Status wajib diisi dan harus salah satu dari opsi
        ]);

        // Update data pesanan
        $pesanan->update($validated);

        return redirect()->route('admin.form')->with('success', 'Data pesanan berhasil diupdate');
    }

    /**
     * Menghapus pesanan
     *
     * @param \App\Models\Pesanan $pesanan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pesanan $pesanan)
    {
        // Hapus pesanan
        $pesanan->delete();
        return redirect()->route('admin.form')->with('success', 'Data pesanan berhasil dihapus');
    }

    /**
     * Export daftar pesanan ke PDF
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exportPDF()
    {
        // Ambil semua pesanan untuk di-export
        $pesanan = Pesanan::latest()->get();

        // Generate PDF
        $pdf = PDF::loadView('admin.form.pdf-list', compact('pesanan'));
        return $pdf->download('daftar-pesanan.pdf');
    }

    /**
     * Export detail pesanan ke PDF
     *
     * @param \App\Models\Pesanan $pesanan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exportDetailPDF(Pesanan $pesanan)
    {
        // Generate PDF detail pesanan
        $pdf = PDF::loadView('admin.form.pdf-detail', compact('pesanan'));
        return $pdf->download('pesanan-' . $pesanan->id . '.pdf');
    }
}
