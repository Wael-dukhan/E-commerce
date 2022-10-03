<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        // dd($products);
        return ProductResource::collection($products);
//        return $products;

    }


    public function show($id)
    {
        return Product::find($id);
    }


    public function store(StoreProductRequest $request)
    {
        $posts = Product::create($request->all());

        return new ProductResource($posts);
    }


    public function update(StoreProductRequest $request, $id)
    {
        $post = Product::findOrFail($id);
        $post->update($request->all());
        return new ProductResource($post);
    }


    public function destroy($id)
    {
        $post = Product::find($id);

        $post->delete();

        return response('the product successfully deleted', 200);
    }
}
