<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@mail.com',
            'usertype' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@mail.com',
            'usertype' => 'user',
        ]);

        $this->call([
            KategoriSeeder::class,
            KatalogSeeder::class,
            PesananSeeder::class,
        ]);
    }
}
