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
            'message' => 'required|string|min:5', // message mora biti sa minimum 5 karaktera
        ]);

        Contact::create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect('/shop');
    }

    public function delete($contact)
    {
        $singleContact = Contact::where(['id' => $contact])->first();

        if ($singleContact === null){
            return redirect()->back()->with('message', 'Kontakt ne postoji!');
        }
        $singleContact->delete();

        return redirect()->route('adminAllContacts');
    }

    public function updateContactForm($contact)
    {
        $singleContact = Contact::findOrFail($contact);

        return view('updateContactForm', compact('singleContact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'email' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string|min:5',
        ]);
        $contact->update([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        return redirect()->route('adminAllContacts');
    }
}
