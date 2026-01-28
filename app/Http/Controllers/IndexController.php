<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function getProducts(Request $request)
    {
        $category = $request->query('category');
        if(!isset($category) || $category == 'all'){
            $products = Product::with('category')->get()->toResourceCollection();
        }
        else {
            $products = Product::where('category_id', $category)->with('category')->get()->toResourceCollection();
        }

        return Inertia::render('index/Index', [
            'products' => $products,
            'category' => Category::get(),
        ]);
    }
    public function getProduct(Request $request)
    {
        $product = new ProductResource(Product::where('id', $request->id)->with('category')->first());

        return Inertia::render('post/Post', ['product'=> $product]);
    }
    public function getCategories(){
        $categories = Category::get()->toResourceCollection();
        return response($categories, 200);
    }
}
