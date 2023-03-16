<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function categorie(){
        return $this->belongsTo(categorie::class);
    }

    public function equipe(){
        return $this->belongsTo(equipe::class);
    }

    public function commentaires(){
        return $this->morphMany(Commentaire::class,'commentable');
    }

}
