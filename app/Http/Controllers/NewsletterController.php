<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsersController;

class NewsletterController extends Controller
{

    public function create()
    {

        return view('projects.Newsletter');
    }


    public function store(Request $request)
    {


        $validate = $request->validate(
            [
                'email' => 'required|unique:newsletters'

            ]
        );

        $newnewsletter = Newsletter::create($validate);
        return back();
    }
}
