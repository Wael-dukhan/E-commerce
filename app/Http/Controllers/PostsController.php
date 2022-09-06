<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        dd('hi I am here in index action');

        //        dd(Gate::allows('admin'));
//        dd(auth()->user()->can('admin'));
//        dd(\request()->user()->can('author')); // true / false
//        dd(\request()->user()->cannot('admin'));

//        $this->authorize('admin');


//        dd(\request(['search']));
//        dd(\request('search'));
//        dd(\request());
//        dd(\request()->only('search'));
//        return view('posts.index', [
////            'posts' => Post::latest()->with('category', 'author')->get(),
//            'posts' => Post::latest()->filter(\request(['search', 'category', 'author']))->get(),
////            'categories' => Category::all(),
////            'currentCategory' => Category::where('slug', \request('category'))->first()
////            'currentCategory' => Category::firstWhere('slug', \request('category'))
//        ]);

//        return Post::latest()->filter(\request(['search', 'category', 'author']))->get();


//        return Post::latest()->filter(\request(['search', 'category', 'author']))->paginate();


        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),
        ]);
    }


    public function create()
    {
       if (auth()->guest()) {
        //    abort(403);
           abort(Response::HTTP_FORBIDDEN);
           return  redirect('/');
       }

       if (auth()->user()->username !== 'admin') {
           abort(Response::HTTP_FORBIDDEN);
       }

        return view('posts.create');
    }


    public function store(StorePostRequest $request)
    {
//        $path = request()->file('thumbnail')->store('thumbnails');
//        return 'Done: '.$path;

//        ddd(request()->file('thumbnail'));
//        ddd(\request()->all());
//        $attributes = \request()->validate([
//            'title' => 'required',
//            'thumbnail' => 'required|image',
//            'slug' => ['required', Rule::unique('posts', 'slug')],
//            'excerpt' => 'required',
//            'body' => 'required',
//            'category_id' => ['required', Rule::exists('categories', 'id')]
//        ]);

        $attributes = $request->all();

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store("public");

        Post::create($attributes);

        return redirect('/');


        //        Post::create([
//            'title' => $attributes['title']
//        ]);


    }



    public function show(Post $post)
    {
//        $post = Post::where('slug', $slug)->first();
        return view('posts.post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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


}
