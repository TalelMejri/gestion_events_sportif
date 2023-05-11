<?php

namespace App\Http\Controllers;

use App\Models\EvenementSportif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {
        Auth::logout();
        Auth::login(User::first());
        $eventSportifs=EvenementSportif::all();
        $data=[
            "titel"=>"Evènement sportif",
            "description"=>"Liste des evénement sportifs",
            "heading"=>config("app.name"),
            "eventsSportifs"=>$eventSportifs
        ];
        return view("home.index",$data);
    }
}
