<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Requests\Advertisement\FilterRequest;
use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = $this->service->makeFilterOnData($data);
        $advertisements = $this->service->getPaginatedAdvertisementsWithFilter($filter);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        return view('admin.advertisement.index',
            compact(
                'advertisements',
                'advertisementsCount',
                'amenitiesCount',
                'usersCount',
            )
        );
    }
}
