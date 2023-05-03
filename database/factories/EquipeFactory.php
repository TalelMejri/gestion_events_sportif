<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipe>
 */
class EquipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $width=50;
        $height=80;
        $path=$this->faker->image('storage/images',$width,$height,'equipe',true,true,'equipe',false);
        return [
            "nom"=>$this->faker->company(),
            "logo"=>$path//$this->faker->imageUrl(360,360,true)
        ];
    }
}
