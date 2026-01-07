<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perfil>
 */
class PerfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "tipo"=>$this->faker->randomElement(['piso','casa','adosado','local','nave','terreno']),
            "ascensor"=>$this->faker->boolean(20),
            "clase_energetica"=>$this->faker->randomElement(['A','B','C','D','E','F','G']),
            "metros"=>$this->faker->numberBetween(20,15000)
        ];
    }
}
