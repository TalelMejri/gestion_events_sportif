<?php

namespace Database\Seeders;

use App\Models\Athlete;
use App\Models\Categorie;
use App\Models\Equipe;
use App\Models\EvenementSportif;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->has(EvenementSportif::factory(1)
          ->has(Categorie::factory(3)
              ->state(new Sequence(
                 ['nom'=>'Minim'],
                 ['nom'=>'Cadet'],
                 ['nom'=>"Senior"],
              ))
              ->state(new Sequence(
                ['genre'=>"Homme"],
                ['genre'=>"Femme"]
              ))
              ->state(new Sequence(
                ["poids"=>'-40kg'],
                ["poids"=>'-50kg'],
                ["poids"=>'+50kg']
              ))->has(Athlete::factory(2)
                  ->state(function(array $attributes , Categorie $categorie ){
                        return ["genre"=>$categorie->genre];
                  })
                  ->for(Equipe::factory())
                  ->hasCommentaires(2)
              )
          )
          ->hasCommentaires(2)
        )
        ->create();
        }
     }

