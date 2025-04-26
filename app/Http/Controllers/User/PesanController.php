<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Kategori;
use App\Models\Katalog;
use Illuminate\Support\Facades\Log;

class PesanController extends Controller
{
    /**
     * Menampilkan halaman daftar pesanan user
     * Mengambil pesanan sesuai email user yang login
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Eager loading relasi dan filter by user email
        $pesanan = Pesanan::with('katalog.kategori')
            ->where('email', auth::user()->email)
            ->latest()
            ->paginate(10);

        return view('pesan', compact('pesanan'));
    }

    /**
     * Menampilkan form pembuatan pesanan baru
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Ambil data untuk dropdown
        $kategoris = Kategori::all();  // Data jenis kendaraan
        $katalogs = Katalog::all();    // Data kendaraan
        return view('pesan.create', compact('kategoris', 'katalogs'));
    }

    /**
     * API untuk mengambil data kendaraan berdasarkan kategori
     * Digunakan untuk dropdown dinamis
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getKendaraan(Request $request)
    {
        try {
            // Ambil kendaraan sesuai kategori yang dipilih
            $kendaraan = Katalog::where('kategori_id', $request->kategori_id)
                ->select('id', 'nama_kendaraan', 'harga_sewa')
                ->get();

            return response()->json($kendaraan);
        } catch (\Exception $e) {
            // Log error dan return response error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Menyimpan pesanan baru
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',      // Nama wajib diisi, string, max 255
            'no_hp' => 'required|string|max:20',      // No HP wajib diisi, max 20
            'email' => 'required|email|max:255',      // Email wajib diisi, format email
            'katalog_id' => 'required|exists:katalogs,id', // Katalog wajib ada di database
        ]);

        // Buat pesanan baru
        $pesanan = Pesanan::create($validated);

        return redirect()->route('pesan')->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Menampilkan detail pesanan
     *
     * @param Pesanan $pesanan
     * @return \Illuminate\View\View
     */
    public function show(Pesanan $pesanan)
    {
        return view('pesan.show', compact('pesanan'));
    }

    /**
     * Export history pesanan user ke PDF (Landscape)
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exportHistoryPDF()
    {
        // Ambil semua pesanan user
        $pesanan = Pesanan::where('email', auth::user()->email)
            ->latest()
            ->get();

        // Generate PDF landscape
        $pdf = PDF::loadView('pesan.pdf-list', compact('pesanan'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('history-pesanan.pdf');
    }

    /**
     * Export detail single pesanan ke PDF
     *
     * @param Pesanan $pesanan
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function exportPDF(Pesanan $pesanan)
    {
        // Generate PDF detail pesanan
        $pdf = PDF::loadView('pesan.pdf', compact('pesanan'));
        return $pdf->download('pesanan-' . $pesanan->id . '.pdf');
    }
}
