<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            // we need to find an email address that exists on the users table
            // and specifically in the email column that matches what you provided
            'email' => 'required|exists:users,email',
//            'email' => 'required|email',
            'password' => 'required'
        ]);



        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (! auth()->attempt($attributes)) {
            // auth failed
            //        return back()
            //            ->withInput()
            //            ->withErrors([
            //            'email' => 'Your provided credentials could not be verified',
            //            'password' => 'Your Password is not right'
            //        ]); // $errors

            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }



        // session fixation
        session()->regenerate();

        // redirect with a success flash message
        return redirect('/')->with('success', 'Welcome Back To Your App!');

    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'GoodBye!');
    }
}
