<?php

namespace App\Services\Amenity;

use App\Models\Amenity;
use Illuminate\Database\Eloquent\Collection;

class Service
{
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
