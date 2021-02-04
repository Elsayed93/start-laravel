<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\CreateRequest;
use App\Models\Product;
use App\Traits\OfferTrait;
use App\Http\Requests\product\UpdateRequest;
use Illuminate\Http\Request;

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
        // dd($request->all());

        $path = 'images/products';
        $file_name = $this->saveImage($request->image, $path);

        // store product 
        $product =  Product::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'image' => $file_name,
        ]);

        if (!$product) {
            return response()->json([
                'status' => 'false',
                'message' => 'failed stored product',
            ]);
        }

        return response([
            'status' => 'true',
            'message' => 'product stored successfully',
        ]);
    }

    //delete product with ajax Request
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'false',
                'message' => 'failed to delete',
                'id' => $id,
            ], 400);
        }

        $product->delete();

        return response()->json([
            'status' => 'true',
            'message' => 'deleted successfully',
            'id' => $id,
        ], 200);
    }

    // edit product form
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', ['product' => $product]);
    }

    // update product
    public function update(Request $request, $id)
    {
        // dd($id);
        dd($request->all());
        dd('asdasdasdasdasdad');
        // dd($request->input('name'));
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
