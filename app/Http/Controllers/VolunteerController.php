<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{

    public function create()
    {
          if (Auth::user()->volunteer) {
            return redirect('projects')->with('message', 'Please choose the project that you would like to  participate in it');
        }  else if (Auth::user()) {
            return view("projects.volunteer");
        } else {
              return redirect('register')->with('message', 'please join us to become a Volunteer');
          }
    }



    public function store(Request $request)
    {
        $validate=$request->validate([
            'phone'=>'required',
            'city' => 'required',
            'description'=>'required',
            ] );

        $userid=Auth::user()->id;

        $newvolunteer = Volunteer::create( [
                'user_id'=>$userid,
                'phone'=>$request->phone,
                'city'=>$request->city,
                'description'=>$request->description,
            ]);

        return back();
    }

    public function chooseProjectToVolunteer($id)
    {
        $user = Auth::user();
        if ($user->volunteer) {

            $checkIfVolunteered =DB::table('project_volunteer')
                                ->where('project_id','=',$id)
                                ->where('volunteer_id','=',$user->volunteer->id)->get();
            if($checkIfVolunteered->count() == 0) {
                DB::table('project_volunteer')->insert([
                    'project_id' => $id,
                    'volunteer_id'   => $user->volunteer->id
                ]);
            return redirect('profile')->with('message', 'thank you for your time');
            }
            else{
            return back()->with('message', 'you already volunteered in this project');
            }


        }  else if($user){
            return view("projects.volunteer");
        } else{
            return redirect('register')->with('message', 'please join us to become a Volunteer');
        }
    }
}
