<?php

namespace App\Http\Controllers\Amenity;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('amenity.create');
    }
}
