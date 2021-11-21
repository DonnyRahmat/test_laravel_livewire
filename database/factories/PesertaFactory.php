<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
            'nama' => $this->faker->name(),
            'alamat_email' => $this->faker->unique()->safeEmail(),
            'nomor_telp' => $this->faker->PhoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
