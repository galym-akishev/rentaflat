<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Constants\PaginationConstants;
use App\Http\Controllers\Controller;
use App\Http\Filters\AdvertisementFilter;
use App\Http\Requests\Advertisement\FilterRequest;
use App\Models\Advertisement;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(AdvertisementFilter::class, ['queryParams' => array_filter($data)]);
        $advertisements = Advertisement::filter($filter)->paginate(PaginationConstants::ADVERTISEMENTS_PER_PAGE);

        return view('admin.advertisement.index', compact('advertisements'));
    }
}
