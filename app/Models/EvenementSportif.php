<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvenementSportif extends Model
{
    use HasFactory;

    public function organisateur(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->hasMany(Categorie::class);
    }

    public function athletes(){
        return $this->hasManyThrough(athletes::class,categories::class);
        // events has many athletes through categorie
    }

    public function commentaires(){
        return $this->morphMany(Commentaire::class,'commentable');
    }

}
