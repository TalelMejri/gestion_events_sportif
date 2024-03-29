<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Athlete>
 */
class AthleteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $width=200;
        $height=200;
        $path=$this->faker->image('storage/app/public/images',$width,$height,'person',true,true,'person',false);
        return [
            "nom"=>$this->faker->firstName(),
            "prenom"=>$this->faker->lastName(),
            "photo"=>config('app.url').'/storage'.Str::after($path,'public/')//$this->faker->imageUrl(360,360,true)
        ];
    }
}
