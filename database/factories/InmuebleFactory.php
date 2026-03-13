<?php

namespace Database\Factories;

use App\Models\Ciudad;
use App\Models\User;
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

        $ciudadAleatoria=Ciudad::obtenerCodPostalAleatorio();
        return [
            "num_catastro"=>$this->faker->num_catastral(),
            "direccion"=>fake()->streetName(),
            "numero"=>fake()->numberBetween(0,500),
            "bloque"=>fake()->randomLetter(),
            "piso"=>fake()->numberBetween(1,100),
            "puerta"=>fake()->randomLetter(),
            "longitud"=>fake()->longitude(),
            "latitud"=>fake()->latitude(),
            "cod_postal"=>$ciudadAleatoria[0],
            "id_municipio"=>$ciudadAleatoria[1],
            "user_id"=>User::factory()->create()
        ];
    }
}
