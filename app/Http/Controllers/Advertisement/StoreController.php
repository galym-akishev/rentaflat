<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Requests\Advertisement\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('advertisement.index');
    }
}
