<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse;
class LoginResponseImpl implements LoginResponse
{

    public function toResponse($request)
    {
        if($request->user()->role=='Organisateur'){
            return redirect()->route('events.index');
        }
        elseif ($request->user()->role=='Admin'){
            return redirect()->route('admin.events');
        }
        else{
            return redirect()->route('visitor');
        }
    }
}

?>
