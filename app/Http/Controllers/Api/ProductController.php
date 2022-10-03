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
        $products = Product::create($request->all());

        return new ProductResource($products);
    }


    public function update(StoreProductRequest $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->update($request->all());
        return new ProductResource($products);
    }


    public function destroy($id)
    {
        $products = Product::find($id);

        $products->delete();

        return response('the product successfully deleted', 200);
    }
}
