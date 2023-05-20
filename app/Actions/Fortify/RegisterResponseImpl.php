<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\RegisterResponse;

class RegisterResponseImpl implements RegisterResponse
{

    public function toResponse($request)
    {
        if($request['role']=='Organisateur'){
            return redirect()->route('events.index');
        }
        elseif ($request['role']=='Admin'){
            return redirect()->route('admin');
        }
        else{
            return redirect()->route('visitor');
        }

    }
}
