<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Requests\Amenity\StoreRequest;
use App\Models\Amenity;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $this->authorize('create', Amenity::class);

        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('amenity.index');
    }
}
