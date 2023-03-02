<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voiture>
 */
class VoitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'marque' => $this->faker->company(),
            'modele' => $this->faker->companySuffix(),
            'couleur' => $this->faker->colorName(),
            'photo' => $this->faker->imageUrl(640, 480, 'cars', true)
        ];
    }
}
