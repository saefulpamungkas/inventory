<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\Produksi;
use App\Models\Produsen;
use App\Models\Supplier;
use App\Models\BarangMasuk;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(3)->create();
        User::factory(3)->create();
        Supplier::factory(3)->create();
        Produsen::factory(3)->create();
        Produksi::factory(3)->create();
        Barang::factory(2)->create();
        // BarangMasuk::factory(1)->create();
        // BarangKeluar::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Saeful Pamungkas',
            'username' => 'saeful',
            'email' => 'saefulpamungkas@gmail.com',
            'role' => 'owner',
            'password' => bcrypt('password')
        ]);
    }
}
