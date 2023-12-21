<?php

namespace App\Services\Advertisement;

use App\Models\Advertisement;
use App\Models\Amenity;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class Service
{

    public function getAllAdvertisements(): LengthAwarePaginator
    {
        return Advertisement::paginate(2);
    }

    public function getAllAmenities(): Collection
    {
        return Amenity::all();
    }

    public function getAmenitiesOfAdvertisement(Advertisement $advertisement): Collection
    {
        return $advertisement->amenities()->get();
    }

    public function getFilesOfAdvertisement(Advertisement $advertisement): Collection
    {
        return $advertisement->files()->get();
    }

    public function store($data): void
    {
        $files = $this->getArrayOfFileNames();
        if (!empty($data['amenities'])) {
            $advertisement = Advertisement::create($data);
            $advertisement->amenities()->attach($data['amenities']);
        } else {
            $advertisement = Advertisement::create($data);
        }
        $advertisement->files()->createMany($files);
        $advertisement
            ->amenities()
            ->updateExistingPivot(
                $advertisement->amenities()->allRelatedIds(),
                [
                    'created_at' => now()
                ]
            );
    }

    public function update($advertisement, $data): void
    {
        $files = $this->getArrayOfFileNames();
        $advertisement->update($data);
        if (!empty($files)) {
            $advertisement->files()->delete();
            $advertisement->files()->createMany($files);
        }
        if (!empty($data['amenities'])) {
            $advertisement->amenities()->sync($data['amenities']);
        } else {
            $advertisement->amenities()->sync([]);
        }
        $advertisement
            ->amenities()
            ->updateExistingPivot(
                $advertisement->amenities()->allRelatedIds(),
                [
                    'updated_at' => now()
                ]
            );
    }

    public function destroy(Advertisement $advertisement): void
    {
        $advertisement
            ->amenities()
            ->updateExistingPivot(
                $advertisement->amenities()->allRelatedIds(),
                [
                    'deleted_at' => now()
                ]
            );
        $advertisement->files()->delete();
        $advertisement->delete();
    }

    /**
     * @return array
     */
    private function getArrayOfFileNames(): array
    {
        $files = [];
        if (request()->file('files')) {
            foreach (request()->file('files') as $key => $file) {
                $file_name = time() . rand(1, 99) . '.' . $file->extension();
                $file->move(public_path('uploads'), $file_name);
                $files[]['name'] = $file_name;
            }
        }
        return $files;
    }
}
