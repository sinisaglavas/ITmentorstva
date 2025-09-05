<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $allContacts = Contact::all();

        return view('allContacts', compact('allContacts'));
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'subject' => 'required|string',
            'description' => 'required|string|min:5' // description mora biti sa minimum 5 slova
        ]);

        echo "Email: ".$request->get('email'). " Naslov: ".$request->get('subject'). " Poruka: ".$request->get('description');

        Contact::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('description')
        ]);

        return redirect('/shop');
    }
}
