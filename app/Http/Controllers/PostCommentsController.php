<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post, Request $request)
    {
        // validation
        $request->validate([
            'body' => 'required|min:25',
        ]);

        $post->comments()->create([
//            'user_id' => auth()->id(),
//            'user_id' => auth()->user()->id,
            'user_id' => $request->user()->id,
//            'body' => \request('body'),
            'body' => $request->input('body'),

        ]);
//        dd($post);
        // add a comment to a given post

//        return back();
        return back()->with('success', 'new comment have been added!');
    }
}
