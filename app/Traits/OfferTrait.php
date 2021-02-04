<?php

namespace App\Traits;

trait OfferTrait
{
    function saveImage($request, $path)
    {
        $file_extension = $request->getClientOriginalExtension(); //to get image extension
        $file_name = time() . '.' . $file_extension;
        $request->move($path, $file_name); // move the filename(image from request after rename it) to the $path(in public root directory)
        return $file_name;
    }
}
