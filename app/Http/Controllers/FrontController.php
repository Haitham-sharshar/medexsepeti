<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;


class FrontController extends Controller
{
     public function home()
     {
         $products = Product::orderBy('created_at', 'DESC')->limit(3)->get();
         $categories = Category::orderBy('created_at', 'DESC')->limit(6)->get();
         $products_views = Product::orderBy('views', 'DESC')->orderBy('views', 'DESC')->limit(3)->get();

         return view('front.index',compact('products','categories','products_views'));
     }

}
