<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $validated=$request->validated();
        $user=User::create([
            "name"=>$validated['name'],
            "email"=>$validated['email'],
            "role"=>$validated['role'],
            "password"=>Hash::make($validated['password'])
        ]);
        return response(new UserResource($user),Response::HTTP_CREATED);
    }

    public function login(Request $request){

        if(!Auth::attempt($request->only('email','password'))){
            return response([
                "error"=>"information invalides"
            ],Response::HTTP_UNAUTHORIZED);
        }

        $user=Auth::user();

        $jwt=  $user->createToken('api_token')->plainTextToken;
        return response([
            "jwt"=>$jwt
        ],200);

    }
}
