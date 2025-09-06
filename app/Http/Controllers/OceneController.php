<?php

namespace App\Http\Controllers;

use App\Models\Ocene;
use Illuminate\Http\Request;

class OceneController extends Controller
{
    public function index()
    {
        $grades = Ocene::all();

        return view('welcome', compact('grades'));
    }

    public function sendGrade(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:64',
            'grade' => 'required|integer|between:5,10',
            'professor' => 'required|string|max:64'
        ]);
        Ocene::create([
            'predmet' => $request->subject,
            'ocena' => $request->grade,
            'profesor' => $request->professor
        ]);

        return redirect('/');
    }
}
