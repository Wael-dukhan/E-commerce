<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // GET
    public function index()
    {
        return view('users.index');
    }

    // GET
    public function create()
    {
        return view('users.create');
    }

    // POST
    public function store(Request $request)
    {
        // validate the form request


    }

    // GET
    public function show($id)
    {
        return view('users.profile', [
            'user' => User::findOrFail($id)
        ]);
    }

    // GET
    public function edit($id)
    {
        return view('users.edit');
    }

    // POST/PATCH
    public function update(Request $request)
    {
        // validate the form request

    }


    public function destroy($id)
    {

    }
}
