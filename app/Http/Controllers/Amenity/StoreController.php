<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Requests\Amenity\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('amenity.index');
    }
}
