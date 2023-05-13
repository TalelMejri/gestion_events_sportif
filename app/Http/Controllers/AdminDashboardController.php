<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function eventDashboard(){

        return view('admin.event-dashboard');
    }
    public function userDashboard(){

        return view('admin.user-dashboard');
    }
}
