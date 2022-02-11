<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return $contacts;
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'phone' => 'numeric|required',
            'adress' => 'required',
            'email' => 'required|email'
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return [
                'created' => false,
                'errors'  => $validator->errors()->all(),
                'contact' => []
            ];
        }


        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->adress = $request->adress;
        $contact->email = $request->email;

        $contact->save();

       return [
        'created' => true,
        'errors'  => [],
        'contact' => $contact,
    ];
    }
   
}