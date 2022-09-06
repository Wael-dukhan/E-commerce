<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view("cart.index",['carts'=>cart::all()]);
    }

    public function store(Request $request)
    {

        // @dd($request->all());
        $attributes = $request->all();
        // @dd(auth()->id);
        $attributes['user_id'] = auth()->id();
        // $attributes['thumbnail'] = request()->file('thumbnail')->store("public");

        cart::create($attributes);

        return redirect('/');
    }
    public function edit()
    {
        return view("cart.edit");
    }
    public function update(Request $request)
    {   
                // {{dd($request);}}
        $cart= cart::find($request->id);
        $cart->Quality=$request->Quality;
        $cart->save();
        return redirect()->route('cart.index')->with('success', 'Cart Updated Successfully');
    }
    public function destroy(Request $request)
    {
        // {{dd($request->id);}}
        cart::find(request()->id)->delete();
        return redirect()->route('cart.index')->with('success', 'Cart Deleted Successfully');
    }
}
