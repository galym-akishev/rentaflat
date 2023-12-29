<?php

namespace App\Services\Admin\Amenity;

use App\Constants\PaginationConstants;
use App\Http\Filters\AmenityFilter;
use App\Models\Amenity;
use Illuminate\Database\Eloquent\Collection;

class Service
{
    public function makeFilterOnData(array $data)
    {
        return app()->make(AmenityFilter::class, ['queryParams' => array_filter($data)]);
    }

    public function getPaginatedAmenitiesWithFilter(AmenityFilter $filter)
    {
        return Amenity::filter($filter)->paginate(PaginationConstants::AMENITIES_PER_PAGE);
    }

    public function getAllAmenities(): Collection
    {
        return Amenity::all();
    }

    public function store($data): void
    {
        Amenity::create($data);
    }

    public function update(Amenity $amenity, $data): void
    {
        $amenity->update($data);
    }

    public function destroy(Amenity $amenity): void
    {
        $amenity->delete();
    }
}
