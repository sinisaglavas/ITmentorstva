<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    // DI Dependency Injection
    // Imamo stalni pristup Product model-u

    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function createNew($request)
    {
        $this->contactModel->create([
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);
    }

    public function getProductById($id)
    {
        return $this->contactModel->where(['id' => $id])->first();
    }

    public function editProduct($contact, $request)
    {
        $contact->email = $request->get('email');
        $contact->subject = $request->get('subject');
        $contact->message = $request->get('message');
        $contact->save();
    }


}
