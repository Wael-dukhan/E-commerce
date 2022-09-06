<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }


    public function store()
    {
//        var_dump(\request()->all());
//        return \request()->all();

        $attributes = \request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
//            'username' => ['required','min:3','max:255', Rule::unique('users','username')],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
//            'password' => ['required', 'min:7', 'max:255'],
        ]);


//        dd($attributes['password']);

//        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);


//        User::create([
//            'name' => ucwords($attributes['name']),
//            'password' => bcrypt($attributes['password']),
//            'username' => $attributes['username'],
//            'email' => $attributes['email']
//        ]);

        auth()->login($user); // helper
//        Auth::login($user);    // Facades

//        session()->flash('success', 'Your account has been created');

//        return redirect('/');
        return redirect('/')->with('success', 'Your account has been created');

    }
}
