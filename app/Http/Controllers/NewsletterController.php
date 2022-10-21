<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;

class NewsletterController extends Controller
{
    
    public function create()
    {
        
        return view('projects.Newsletter');
    }


        public function store(Request $request)
    {

      Auth::user()->id;

    $validate=$request->validate(
        [   
            'email' => 'required'
        ]   
    );

    $newnewsletter = Newsletter::create($validate);
    return back();
    }
}
