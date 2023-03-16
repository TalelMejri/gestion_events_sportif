<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function evenementsSportif(){
        return $this->belongsTo(evenementsSportif::class);
    }

    public function athletes(){
        return $this->hasMany(Athlete::class);
    }


}
