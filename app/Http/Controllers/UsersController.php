<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;

class UsersController extends Controller
{

    // Show Register Form
    public function create()
    {
        return view('users.signup');
    }

    // Create New User
    public function store(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate(
            [
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => 'required|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            ],
            [
                'password.regex' => 'The password should have minimum eight characters,
            at least one letter, one number and one special character'
            ]
        );


        // Hash Password
        $formFields['password'] = Hash::make($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Create a Registration Event for Email Verification
        event(new Registered($user));

        // Login
        auth()->login($user);

        return redirect()->intended('/');
        // return redirect('/email/verify');
    }


    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    //  Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Login User
    public function authenticate(Request $request)
    {

        $remember = $request->has('remember') ? true : false;

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::attempt($formFields, $remember) && (Gate::allows('admin'))) {
            $request->session()->regenerate();

            // return redirect('/');
            return redirect()->intended('/dashboard');
        } else if (Auth::attempt($formFields, $remember) && (Gate::denies('admin'))) {
            $request->session()->regenerate();

            // return redirect('/');
            return redirect()->intended('/');
        }

        return back()->with('email' ,'Wrong Email or Password');
    }

    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()

    {

        try {

            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {

            // return redirect('/redirect');
            return $e;
        }

        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('/');
        } else {

            $newUser                  = new User;

            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;

            $newUser->save();

            Auth::login($newUser);

            // return redirect()->back();
            return redirect()->intended('/');
        }
    }
}
