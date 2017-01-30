<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class HomeController extends Controller
{
    public function showLoginPage()
    {
        $contacts = Contact::paginate(5);
        return view('login', compact('contacts'));
    }

    public function store(Request $request)
    {
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $contact_number = $request->get('contact_number');

        $contact = new Contact();

        $contact->first_name = $first_name;
        $contact->last_name = $last_name;
        $contact->contact_number = $contact_number;

        $contact->save();

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $contact = Contact::find($id);
        $contact->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $contact_number = $request->get('contact_number');

        $contact = Contact::find($id);

        $contact->first_name = $first_name;
        $contact->last_name = $last_name;
        $contact->contact_number = $contact_number;

        $contact->save();

        return redirect()->to('/login');
    }
}
