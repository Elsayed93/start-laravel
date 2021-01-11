<?php

namespace App\Trait;

trait OfferTrait
{
    function saveImage($request, $path)
    {
        $file_extension = $request->getClientOriginalExtension(); //to get image extension
        // dd($file_extension);
        $file_name = time() . '.' . $file_extension;
        // dd($file_name);
        $request->move($path, $file_name); // move the filename(image from request after rename it) to the $path(in public root directory)
        return $file_name;
    }
}
