<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Filters\AdvertisementFilter;
use App\Http\Requests\Advertisement\FilterRequest;
use App\Models\Advertisement;

class IndexController extends BaseController
{
    private const ADVERTISEMENTS_PER_PAGE = 2;
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(AdvertisementFilter::class, ['queryParams' => array_filter($data)]);
        $advertisements = Advertisement::filter($filter)->paginate(self::ADVERTISEMENTS_PER_PAGE);
//        dd($advertisements);
//        $advertisements = $this->service->getAllAdvertisements();

        return view('advertisement.index', compact('advertisements'));
    }
}
