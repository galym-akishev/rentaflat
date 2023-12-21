<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Requests\Amenity\StoreRequest;
use App\Models\Amenity;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Amenity::create($data);
        
        return redirect()->route('amenity.index');
    }
}
