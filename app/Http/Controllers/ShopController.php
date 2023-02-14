<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Image;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        $product = Product::all();
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('frontend.shop' , compact($product, $category, $subcategory));
    }
     
    public function product(Request $request)
    {
        // $product = Product::all();
        // $images = Image::all();
        // $categorys = Category::all();
        // return view('frontend.product', compact('product','images','categorys'));

        $product = Product::with('category','image')->get();
        return view('frontend.product', compact('product'));

    }

    public function detailproduct(Product $product, Image $images)
    {
        return view('frontend.detailproduct', compact('product','images'));
    }
}
