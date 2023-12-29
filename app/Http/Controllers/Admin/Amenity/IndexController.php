<?php

namespace App\Http\Controllers\Admin\Amenity;

use App\Http\Requests\Amenity\FilterRequest;
use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = $this->service->makeFilterOnData($data);
        $amenities = $this->service->getPaginatedAmenitiesWithFilter($filter);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        return view('admin.amenity.index',
            compact(
                'amenities',
                'advertisementsCount',
                'amenitiesCount',
                'usersCount',
            )
        );
    }
}
