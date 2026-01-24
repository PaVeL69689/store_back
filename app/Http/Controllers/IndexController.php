<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request){

        $category = $request->query('category');
        if($category == 'all'){
            $products = Product::with('category')->get()->toResourceCollection();
        }
        else {
            $products = Product::where('category_id', $request->category)->with('category')->get()->toResourceCollection();
        }

        return response($products, 200);
    }
}
