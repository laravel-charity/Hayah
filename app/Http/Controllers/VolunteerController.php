<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{

    public function create()
    {
            
        return view('projects.volunteer');
    }



        public function store(Request $request)
    {
       
      
    $validate=$request->validate(
        [
            'phone'=>'required',
            'city' => 'required',
            'description'=>'required',
        ]
            
    );

    $userid=Auth::user()->id;    
    $newvolunteer = Volunteer::create(
        [
            'user_id'=>$userid,
            'phone'=>$request->phone,
            'city'=>$request->city,
            'description'=>$request->description,
        ]);

    return redirect('volunteer');
    }


}
