<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::user()->id;



        // if user was volunteer
        if (User::find($id)->volunteer) {
            // get information user when he was volunteer
            $volunteerProject = Volunteer::where("user_id", $id)->get();
            // $volunteerProject = User::find($id)->volunteer;
            return view(
                'users.profile',
                //get basic info for user from user_id
                [
                    'userData'         => User::find($id),
                    'volunteerProject' => $volunteerProject
                ]
            );
        } else  // if user was not volunteer
        {
            // get information user when he was volunteer
            $volunteerProject = Volunteer::where("user_id", $id)->get();
            return view(
                'users.profile',
                //get basic info for user base user_id
                [
                    'userData' => User::find($id),
                    'volunteerProject' => $volunteerProject
                ]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editData()
    {
        $id = Auth::user()->id;
        return view('users.profile-edit', ['userData' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request)
    {
        // get logged in user
        $user = Auth::user();
        //Assign the new values
        $user->name = $request->name;

        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('logos', 'public');
        }

        if ($user->volunteer) {
            $volunteer = Volunteer::where('user_id', $user->id)->first();
            $volunteer->description = $request->description;
            $volunteer->phone = $request->phone;
            $volunteer->city = $request->city;
            $volunteer->save();
        }

        $user->save();

        return redirect('profile')->with('message', 'information changed successfully');
    }

    public function showPassChange()
    {
        return view('users.change-pass');
    }


    public function changePass(Request $request)
    {
        // validate password
        $request->validate(
            [
                'password_current'      => 'required',
                'password_new'          => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required'
            ],
            [
                'password_new.regex' => 'The password should have minimum eight characters,
        at least one letter, one number and one special character'
            ]
        );

        // get logged in user
        $user = Auth::user();
        // check password current is correct
        $checkPass = Hash::check($request->password_current, $user->password);

        if ($checkPass) {
            //Assign the new password
            $user->password = Hash::make($request->password_new);
            $user->save();
            return redirect('profile')->with('message', 'password changed successfully');
        };

        return redirect('changepass')->with('error_message', 'invalid password ');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // ------------------- admin profile -------------------
    // Profile page - ahmad
    public function adminprofile($id)
    {
        $admin = User::find($id);
        $volunteerProject = Volunteer::where("user_id", $id)->get();

        return view('dashboard.profile.profile', ['userData' => $admin, 'volunteerProject' => $volunteerProject]);
    }
    // update profile picture - ahmad

    public function updateAdminPhoto(Request $request)
    {

        $user = Auth::user();

        $val = $request->validate(['image' => 'required']);

        $user->image = $request->file('image')->store('logos', 'public');
        $user->save();
        return redirect()->back();
    }

    // update admin info - ahmad

    public function updateAdmin(Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $request->validate(
            [
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email'],
            ]
        );
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->volunteer != null) {

            $request->validate([
                'phone' => 'required|numeric|digits:10',
                'city' => 'required',
            ]);
            $volunteer = volunteer::find($user->id);
            $volunteer->phone = $request->phone;
            $volunteer->city = $request->city;
            $volunteer->description = $request->description;
            $volunteer->save();
        }
        $user->save();
        return back()->with('message', 'information changed successfully');
    }
}
