<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\PasswordReset;

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
            return redirect('/dashboard');
        } else if (Auth::attempt($formFields, $remember) && (Gate::denies('admin'))) {
            $request->session()->regenerate();

            // return redirect('/');
            return redirect()->intended('/');
        }

        return back()->with('email', 'Wrong Email or Password');
    }

    // Redirect to Sign in With Google Page
    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();
    }


    // Handle actual Sign up / login functionality with Google
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

            if (Gate::allows('admin')) {
                return redirect('/dashboard');
            } else if (Gate::denies('admin')) {
                return redirect()->intended('/');
            }
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

    // Show Forgot Password Request Form
    public function resetPasswordRequest()
    {
        return view('users.forgot-password');
    }

    // Handle validating the email address and sending the password reset request to the corresponding use
    public function validateResetPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Show Reset Password Form
    public function resetPassword($token)
    {
        return view('users.reset-password', ['token' => $token]);
    }

    // Handle password reset
    public function handleResetPassword(Request $request)
    {
        $request->validate(
            [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/|confirmed',
            ],
            [
                'password.regex' => 'The password should have minimum eight characters,
        at least one letter, one number and one special character'
            ]
        );

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
