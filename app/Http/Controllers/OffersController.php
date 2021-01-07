<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class OffersController extends Controller
{
    public function index()
    {
        // return Offer::select('name', 'price', 'details')->get();
        // $offers = Offer::select('name', 'price', 'photo')->get();
        // dd($offers);

        // $offers = Offer::all();
        $offers = Offer::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'details_' . LaravelLocalization::getCurrentLocale() . ' as details',
            'price'
        )->get();
        // return $offers;
        // dd($offers);
        return view('offers.index', ['offers' => $offers]);
    }

    public function store(OfferRequest $request)
    {
        // dd($request->all());
        // $offer = Offer::create([
        //     'name' => 'test-name',
        //     'price' => 'test-price',
        //     'details' => 'test-details'
        // ]);

        // if($offer){
        //     return 'offer is created successfully';
        // }

        // return 'failed to store offer';

        /**
         *   validate data before store in the database
         * */
        // $data = $request->all();
        // $rules = $this->validationRules();
        // $messages = $this->validationMessages();

        // $validator = Validator::make(
        //     $data,
        //     $rules,
        //     $messages
        // );

        // if ($validator->fails()) {
        //     // dd($validator);
        //     // return $validator->errors();
        //     // return redirect('offers/create')->withErrors($validator);
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        /*******************************          
         * store data in database after validation
         */
        $offer = Offer::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
            'price' => $request->price,
        ]);

        // dd($offer);
        return view('offers.create', ['successAdded' => __('create-offer.success-offer')]);
    }

    // create form view 
    public function create()
    {
        return view('offers.create');
    }

    // protected function validationRules()
    // {
    //     return [
    //         'name' => 'required|unique:offers|max:255',
    //         'price' => 'required|max:255|min:1',
    //         'details' => 'required|min:10',
    //     ];
    // }

    // protected function validationMessages()
    // {
    //     return [
    //         'name.required' => __('messages.name.required'),
    //         'name.unique' => __('messages.name.unique'),
    //         'price.required' => __('messages.price.required'),
    //         'details.required' => __('messages.details.required'),
    //     ];
    // }
}
