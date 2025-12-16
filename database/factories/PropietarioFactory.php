<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propietario>
 */
class PropietarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre"=>fake()->name,
            "telefono"=>fake()->phoneNumber(),
            "direccion"=>fake()->address(),
            "dni"=>fake()->numberBetween(10000000,99999999).fake()->randomLetter()

        ];
    }
}
