<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Requests\Advertisement\StoreRequest;
use App\Models\Advertisement;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $this->authorize('create', Advertisement::class);

        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('advertisement.index');
    }
}
