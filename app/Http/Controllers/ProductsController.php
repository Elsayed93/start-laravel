<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\CreateRequest;
use App\Models\Product;
use App\Trait\OfferTrait;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        //validation 
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products,name|max:255',
            'details' => 'required|min:10',
            'price' => 'required|max:255|min:1',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            // return redirect()->back()->withErrors($validator)->withInput();
            return response([
                'status' => 'false',
                'message' => 'failed to store',
            ], 400);
        }


        $path = 'images/products';
        $file_name = $this->saveImage($request->image, $path);

        // store product 
        $product =  Product::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'image' => $file_name,
        ]);

        // return view('products.create', ['successAdded' => __('create-offer.success')]);

        return response([
            'status' => 'true',
            'message' => 'product stored successfully',
        ]);
    }

    //delete product with ajax Request
    public function delete(Request $request)
    {
        $prod = Product::find($request->id);
        $prod->delete();
        return response()->json(['message' => 'success'], 200);
        // Product::findOrFail($id)->delete();
    }
}
