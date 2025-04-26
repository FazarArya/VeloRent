<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        $pesanan = [
            [
                'nama' => 'John Doe',
                'email' => 'john@example.com',
                'no_hp' => '08123456789',
                'katalog_id' => 1, // Honda Beat
                'status' => 'approved',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(4),
            ],
            [
                'nama' => 'Jane Smith',
                'email' => 'jane@example.com',
                'no_hp' => '08234567890',
                'katalog_id' => 5, // Toyota Avanza
                'status' => 'pending',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'nama' => 'Bob Wilson',
                'email' => 'bob@example.com',
                'no_hp' => '08345678901',
                'katalog_id' => 2, // Honda Vario
                'status' => 'rejected',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(1),
            ],
            [
                'nama' => 'Alice Brown',
                'email' => 'alice@example.com',
                'no_hp' => '08456789012',
                'katalog_id' => 6, // Toyota Innova
                'status' => 'approved',
                'created_at' => now()->subDay(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Charlie Davis',
                'email' => 'charlie@example.com',
                'no_hp' => '08567890123',
                'katalog_id' => 3, // Yamaha NMAX
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($pesanan as $item) {
            Pesanan::create($item);
        }
    }
}
