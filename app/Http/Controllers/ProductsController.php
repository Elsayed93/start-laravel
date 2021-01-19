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
        // return $request;
        $product = Product::find($request->id);
        $product->delete();

        if (!$product) {
            return response()->json([
                'status' => 'false',
                'message' => 'failed to delete',
                'id' => $request->id,
            ], 400);
        }

        return response()->json([
            'status' => 'true',
            'message' => 'deleted successfully',
            'id' => $request->id,
        ], 200);
    }

    // edit product form
    public function edit(Request $request)
    {
        $product = Product::findOrFail($request->id);

        return view('products.edit', ['product' => $product]);
    }

    // update product
    public function update(Request $request)
    {
        // return $request;

        $product = Product::findOrFail($request->id)->update($request->all());

        if (!$product) {
            return response()->json([
                'status' => 'false',
                'message' => 'failed to update',
            ], 400);
        }

        return response()->json([
            'status' => 'true',
            'message' => 'successfully updated',
        ], 200);
    }
}
