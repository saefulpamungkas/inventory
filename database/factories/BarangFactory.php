<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'id_masuk' => fake()->numberBetween(1, 2),
            'kode_barang' => fake()->randomElement(['221A', '221B']),
            'nama_barang' => fake()->randomElement(['Putih', 'Merah']),
            'harga' => fake()->randomElement(['221A', '221B']),
            'jumlah_barang' => fake()->numberBetween(0, 0),
            'spek_barang' => fake()->randomElement(['12 yard', '14 yard']),
        ];
    }
}
