<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\CreateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Trait\OfferTrait;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{

    use OfferTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
    public function store(CreateRequest $request)
    {

        $path = 'images/products';
        $file_name = $this->saveImage($request->image, $path);

        // store product 
        Product::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'image' => $file_name,
        ]);

        return view('products.create', ['successAdded' => __('create-offer.success')]);
    }
}
