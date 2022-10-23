<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{

    public function create()
    {

        return view('projects.Newsletter');
    }


    public function store(Request $request)
    {

        $validate = Validator::make(
            $request->all(),
            [
                'email' => 'required|unique:newsletters|email'

            ],
            [
                'email.unique' => 'You are already subscribed'
            ]
        );

        if ($validate->fails()) {
            return back()->with('error_message', 'This email is already subscribed to our newsletter!');
        }

        $newnewsletter = Newsletter::create([
            'email' => $request->email
        ]);
        return back()->with('message', 'Thank you for subscribing to our newsletter!');
    }
}
