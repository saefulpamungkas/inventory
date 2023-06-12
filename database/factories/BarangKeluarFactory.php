<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangKeluar>
 */
class BarangKeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_barang' => fake()->numberBetween(1, 2),
            'nama_pemesan' => fake()->name(),
            'jumlah_barang' => fake()->numberBetween(1, 5),
            'tanggal_keluar' => fake()->dateTimeThisMonth(),
            'total' => fake()->numberBetween(1, 2),
        ];
    }
}
