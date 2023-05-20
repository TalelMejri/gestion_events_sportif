<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventSportifRequest;
use App\Models\EvenementSportif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class EventSportifController extends Controller
{

    /*public function __construct()
    {
        $this->authorizeResource(EvenementSportif::class, 'events');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Auth::user()->evenementSportif()->paginate(2);
        $data=[
            "titel"=>$description="Mes évènement sportifs",
            "description"=>$description,
            "eventsSportifs"=>$events,
            "heading"=>$description
        ];
        return view("events.mes-events",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[
            "titel"=>$description="Créer un nouvel évenement Sportif",
            "description"=>$description,
            "heading"=>$description
        ];
        return view("events.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventSportifRequest $request)
    {
        DB::beginTransaction();
        try{
            $validate=$request->validated();
            $poster=null;
            $posterUrl=null;
            if(($request->file("poster")!==null)&&($request->file("poster")->isValid())){
                $ext=$request->file("poster")->extension();
                $filename=Str::uuid().'.'.$ext;
                $poster=$request->file("poster")->storeAs("public/images",$filename);
                $posterUrl=env("APP_URL").Storage::url($poster);
            };
            Auth::user()->evenementSportif()->create([
                "nom"=>$validate["nom"],
                "description"=>$validate['description'],
                "lieu"=>$validate["lieu"],
                "posterUrl"=>$posterUrl,
                "dateDebut"=>$validate["dateDebut"],
                "dateFin"=>$validate["dateFin"]
            ]);
        }catch(ValidationException $e){
            DB::rollBack();
        }
        DB::commit();
        return redirect()->route("events.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Http\Response
     */
    public function show(EvenementSportif $event)
    {

        $data=[
            "titel"=>"Evènement Sportif :".$event->nom,
            "description"=>"Détails event :".$event->nom,
            "heading"=>config("app.name"),
            "eventSportif"=>$event
        ];
        return view("events.details-event",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Http\Response
     */
    public function edit(EvenementSportif $evenementSportif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EvenementSportif $evenementSportif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EvenementSportif  $evenementSportif
     * @return \Illuminate\Http\Response
     */
    public function destroy(EvenementSportif $evenementSportif)
    {
        //
    }
}
