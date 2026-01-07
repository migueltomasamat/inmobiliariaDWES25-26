<?php

namespace Database\Factories;

use App\Models\Ciudad;
use App\Models\Propietario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inmueble>
 */
class InmuebleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "num_catastro"=>$this->faker->num_catastral(),
            "direccion"=>fake()->streetName(),
            "numero"=>fake()->numberBetween(0,500),
            "bloque"=>fake()->randomLetter(),
            "piso"=>fake()->numberBetween(1,100),
            "puerta"=>fake()->randomLetter(),
            "cod_postal"=>Ciudad::obtenerCodPostalAleatorio(),
            "propietario_id"=>Propietario::factory()->create()
        ];
    }
}
