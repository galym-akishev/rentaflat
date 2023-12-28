<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Enums\PublishedStatusEnum;
use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class EditController extends BaseController
{
    public function __invoke(Advertisement $advertisement)
    {
        $this->authorize('update', $advertisement);

        $advertisementsCount = Advertisement::getAdvertisementsCount();
        $usersCount = User::getUsersCount();
        $amenitiesCount = Amenity::getAmenitiesCount();

        $publishedStatusesEnum = array_column(PublishedStatusEnum::cases(), 'value');

        return view(
            'admin.advertisement.edit',
            compact(
                'advertisement',
                'advertisementsCount',
                'amenitiesCount',
                'usersCount',
                'publishedStatusesEnum'
            )
        );
    }
}
