<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produsen>
 */
class ProdusenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produsen' => fake()->name(),
            'no_seluler' => fake()->phoneNumber(),
            'no_telp_wa' => fake()->phoneNumber(),
            'alamat_produsen' => fake()->state(),
        ];
    }
}
