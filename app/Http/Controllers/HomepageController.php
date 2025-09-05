<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $currentHour = date('H');
        $currentTime = date('H:i:s');
        return view('welcome', compact('currentTime', 'currentHour'));
    }
}
