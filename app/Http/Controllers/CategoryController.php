<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        return view('categories.index', [
           'categories' => Category::all()
        ]);
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
//        dd($request->post());
        $request->validate([
           'name' => 'required|min:3',
           'slug' => 'required'
        ]);

        // Eloquent Model
        Category::create($request->post());
        return redirect()->route('categories.index')->with('success', 'Category Added Successfully');
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
    public function edit($id)
    {
        return view("categories.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
                // {{dd($request);}}
        $category= Category::find($request->id);
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->save();
        // DB::table('categories')->where('id',$id)->update(['name'=>request()->name,'slug'=>request()->slug]);
        // $category=new Category();
        // $category->update(request()->post())->where('id',$id);
        // DB::update('update categories set name = "?" and slug = "?" where id = "?"', [request()->name,request()->slug,request()->id]);
        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        // {{dd($request->id);}}
        Category::find(request()->id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully');
    }
}
