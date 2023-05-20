<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EvenementSportifResource;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EvenementSportifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user=User::find(1);

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

            $eventSportif=Auth::user()->eventSportifs()->create([
                "nom"=>$validate["nom"],
                "description"=>$validate['description'],
                "lieu"=>$validate["lieu"],
                "posterUrl"=>$posterUrl,
                "dateDebut"=>$validate["dateDebut"],
                "dateFin"=>$validate["dateFin"]
            ]);

        }catch(ValidationException $exception){
            DB::rollBack();
        }

        DB::commit();

        return response(new EvenementSportifResource($eventSportif), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
