<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('amenity.create');
    }
}
