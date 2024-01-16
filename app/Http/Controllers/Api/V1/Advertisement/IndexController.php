<?php

namespace App\Http\Controllers\Api\V1\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advertisement\FilterRequest;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = $this->service->makeFilterOnData($data);
        $advertisements = $this->service->getPaginatedAdvertisementsWithFilter($filter);

        return response()->json($advertisements);
    }
}
