<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use App\Models\Amenity;

class UpdateController extends Controller
{
    public function __invoke(Amenity $amenity)
    {
        $data = request()->validate(
            [
                'title' => 'string',
            ]
        );
        $amenity->update($data);
        return redirect()->route('amenity.show', $amenity->id);
    }
}
