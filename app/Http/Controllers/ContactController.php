<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactRepo;
    public function __construct()
    {
        $this->contactRepo = new ContactRepository();
    }

    public function index()
    {
        return view('contact');
    }

    public function getAllContacts()
    {
        $allContacts = Contact::all();

        return view('allContacts', compact('allContacts'));
    }

    public function sendContact(SaveContactRequest $request)
    {
        $this->contactRepo->createNew($request);

        return redirect('/shop');
    }

    public function delete($contact)
    {
        $singleContact = $this->contactRepo->getProductById($contact);

        if ($singleContact === null){
            return redirect()->back()->with('message', 'Kontakt ne postoji!');
        }
        $singleContact->delete();

        return redirect()->route('adminAllContacts');
    }

    public function updateContactForm(Contact $contact)
    {
        return view('updateContactForm', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $this->contactRepo->editProduct($contact, $request);

        return redirect()->route('adminAllContacts');
    }
}
