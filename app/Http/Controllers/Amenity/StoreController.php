<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use App\Models\Amenity;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate(
            [
                'title' => 'string',
            ]
        );
        Amenity::create($data);
        return redirect()->route('amenity.index');
    }
}
