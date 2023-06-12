<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\barang_masuk>
 */
class BarangMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_supplier' => fake()->numberBetween(1, 2),
            'id_barang' => fake()->numberBetween(1, 2),
            'jumlah_barang' => fake()->numberBetween(1, 5),
            'tanggal_masuk' => fake()->dateTimeThisMonth(),
        ];
    }
}
