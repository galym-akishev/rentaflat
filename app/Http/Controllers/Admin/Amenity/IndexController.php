<?php

namespace App\Http\Controllers\Admin\Amenity;

use App\Constants\PaginationConstants;
use App\Http\Filters\AdvertisementFilter;
use App\Http\Requests\Advertisement\FilterRequest;
use App\Models\Amenity;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(AdvertisementFilter::class, ['queryParams' => array_filter($data)]);
        $amenities = Amenity::filter($filter)->paginate(PaginationConstants::AMENITIES_PER_PAGE);

        $advertisementsCount = $this->service->getAdvertisementsCount();
        $usersCount = $this->service->getUsersCount();
        $amenitiesCount = $this->service->getAmenitiesCount();

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
