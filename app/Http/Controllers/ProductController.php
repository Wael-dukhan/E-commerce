<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Notifications\PostNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

//        dd('hi I am here in index action');

        //        dd(Gate::allows('admin'));
//        dd(auth()->user()->can('admin'));
            // \request()->user()->can('admin');
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


        return view('products.index', [
            'products' => Product::latest()->filter(
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

        return view('products.create');
    }


    public function store(StoreProductRequest $request)
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
        // dd(request()->file('thumbnail'));
        $attributes['thumbnail'] = request()->file('thumbnail')->store("public");
        // $extension= $attributes['thumbnail']->getClientOriginalExtension();
        // $filename=time().'.'.$extension;
        // $attributes['thumbnail']->move('public/image/',$filename);
        // dd($attributes['thumbnail']);
        $postN=Product::create($attributes);
        // dd($postN);
        // dd(auth()->user()->name);
        $userNotifications=User::where('id','!=',auth()->user()->id)->get();
        Notification::send($userNotifications,new PostNotification($postN->slug,auth()->user()->name,$postN->title));
        return redirect('/');

        //        Post::create([
//            'title' => $attributes['title']
//        ]);


    }



    public function show(Product $product)
    {
        // DB::table('notifications')->where('data->post_slug',$post->slug)->pluck('id')->update(['read_at'=>now()]);
//        $post = Post::where('slug', $slug)->first();
        return view('products.product', [
            'product' => $product
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
