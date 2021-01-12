<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::get();
        // dd($products);
        return view('products.index', compact('products'));
    }

    // create form
    public function create()
    {
        return view('products.create');
    }

    // store product using AJAX
    public function store(Request $request)
    {
        $product = $request->all();
        // validation 
        // $validator = Validator::make([

        // ]);

        // store product 
        Product::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
        ]);
    }
}
