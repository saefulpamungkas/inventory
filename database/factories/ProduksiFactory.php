<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produksi>
 */
class ProduksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->randomElement(['211A', '211B', '211C']),
            'jumlah_produksi' => fake()->numberBetween(0, 0),
            'spek' => fake()->randomElement(['12 yard', '13 yard'])
        ];
    }
}
