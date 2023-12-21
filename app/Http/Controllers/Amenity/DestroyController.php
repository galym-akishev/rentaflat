<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use App\Models\Amenity;

class DestroyController extends Controller
{
    public function __invoke(Amenity $amenity)
    {
        $amenity->delete();
        return redirect()->route('amenity.index');
    }
}
