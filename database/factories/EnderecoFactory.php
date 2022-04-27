<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factory>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'logradouro' => $this->faker->streetName,
            'numero'     => $this->faker->numberBetween(1, 1000),
            'bairro'     => $this->faker->streetName,
            'complemento'=> $this->faker->sentence(10),
            'cidade_ibge'  => $this->faker->numberBetween(1, 10),
        ];
    }
}
