<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Requests\Advertisement\FilterRequest;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = $this->service->makeFilterOnData($data);
        $advertisements = $this->service->getPaginatedAdvertisementsWithFilter($filter);

        return view('advertisement.index', compact('advertisements'));
    }
}
