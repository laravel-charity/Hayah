<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function create()
    {

        return view('projects.contact');
    }



    public function store(Request $request)
    {

        $validate = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]

        );

        $newcontact = Contact::create($validate);
        return redirect('/')->with('message', 'Your message was sent successfully');
    }
}
