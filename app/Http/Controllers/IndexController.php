<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    public function getProducts(Request $request): Response
    {

        $category = $request->query('category');
        if($category == 'all'){
            $products = Product::with('category')->get()->toResourceCollection();
        }
        else {
            $products = Product::where('category_id', $category)->with('category')->get()->toResourceCollection();
        }

        return response($products, 200);
    }
    public function getProduct(Request $request)
    {
        $product = new ProductResource(Product::where('id', $request->id)->with('category')->first());

        return response($product, 200);
    }
    public function getCategories(){
        $categories = Category::get()->toResourceCollection();
        return response($categories, 200);
    }
}
