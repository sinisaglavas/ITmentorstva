<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $currentHour = date('h');
        $currentTime = date('h:i:s');
        return view('welcome', compact('currentTime', 'currentHour'));
    }
}
