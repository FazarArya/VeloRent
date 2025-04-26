<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Katalog;

class KatalogSeeder extends Seeder
{
    public function run(): void
    {
        $katalogs = [
            // Motor
            [
                'jenis_kendaraan' => 'motor',
                'nama_kendaraan' => 'Honda Beat',
                'deskripsi' => 'Motor matic ekonomis',
                'harga_sewa' => 80000.00,
                'kategori_id' => 1
            ],
            [
                'jenis_kendaraan' => 'motor',
                'nama_kendaraan' => 'Honda Vario',
                'deskripsi' => 'Motor matic nyaman',
                'harga_sewa' => 90000.00,
                'kategori_id' => 1
            ],
            [
                'jenis_kendaraan' => 'motor',
                'nama_kendaraan' => 'Yamaha NMAX',
                'deskripsi' => 'Motor matic premium',
                'harga_sewa' => 150000.00,
                'kategori_id' => 1
            ],
            [
                'jenis_kendaraan' => 'motor',
                'nama_kendaraan' => 'Honda PCX',
                'deskripsi' => 'Motor matic premium',
                'harga_sewa' => 150000.00,
                'kategori_id' => 1
            ],

            // Mobil
            [
                'jenis_kendaraan' => 'mobil',
                'nama_kendaraan' => 'Toyota Avanza',
                'deskripsi' => 'Mobil keluarga 7 seater',
                'harga_sewa' => 300000.00,
                'kategori_id' => 2
            ],
            [
                'jenis_kendaraan' => 'mobil',
                'nama_kendaraan' => 'Toyota Innova',
                'deskripsi' => 'Mobil keluarga premium',
                'harga_sewa' => 450000.00,
                'kategori_id' => 2
            ],
            [
                'jenis_kendaraan' => 'mobil',
                'nama_kendaraan' => 'Honda Brio',
                'deskripsi' => 'City car ekonomis',
                'harga_sewa' => 250000.00,
                'kategori_id' => 2
            ],
            [
                'jenis_kendaraan' => 'mobil',
                'nama_kendaraan' => 'Toyota Calya',
                'deskripsi' => 'Mobil keluarga ekonomis',
                'harga_sewa' => 250000.00,
                'kategori_id' => 2
            ],
        ];

        foreach ($katalogs as $katalog) {
            Katalog::create($katalog);
        }
    }
}
