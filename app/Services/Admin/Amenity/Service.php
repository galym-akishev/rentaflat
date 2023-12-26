<?php

namespace App\Services\Admin\Amenity;

use App\Models\Advertisement;
use App\Models\Amenity;
use App\Models\User;

class Service
{
    public function getAdvertisementsCount(): int
    {
        return Advertisement::count();
    }

    public function getUsersCount(): int
    {
        return User::count();
    }

    public function getAmenitiesCount(): int
    {
        return Amenity::count();
    }
}
