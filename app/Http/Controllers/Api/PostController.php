<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return PostResource::collection($posts);
//        return $posts;


    }


    public function show($id)
    {
        return Post::find($id);
    }


    public function store(StorePostRequest $request)
    {
        $posts = Post::create($request->all());

        return new PostResource($posts);
    }


    public function update(StorePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return new PostResource($post);
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return response('the post successfully deleted', 200);
    }
}
