<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Product $product, Request $request)
    {
        // validation
        $request->validate([
            'body' => 'required|min:5',
        ]);

        $product->comments()->create([
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
