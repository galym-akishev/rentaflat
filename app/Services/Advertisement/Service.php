<?php

namespace App\Services\Advertisement;

use App\Constants\PaginationConstants;
use App\Enums\PublishedStatusEnum;
use App\Http\Filters\AdvertisementFilter;
use App\Models\Advertisement;
use App\Models\Amenity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function makeFilterOnData(array $data)
    {
        return app()->make(AdvertisementFilter::class, ['queryParams' => array_filter($data)]);
    }

    public function getPaginatedAdvertisementsWithFilter(AdvertisementFilter $filter)
    {
        return Advertisement::where('published', '=', PublishedStatusEnum::PUBLISHED)
            ->filter($filter)
            ->paginate(PaginationConstants::ADVERTISEMENTS_PER_PAGE);
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

    public function getOwnerOfAdvertisement(Advertisement $advertisement): string
    {
        return $advertisement->user->name;
    }

    public function store($data): void
    {
        try {
            DB::beginTransaction();
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
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function update(Advertisement $advertisement, $data): void
    {
        try {
            DB::beginTransaction();
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
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function destroy(Advertisement $advertisement): void
    {
        try {
            DB::beginTransaction();
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
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
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
//                $file->move(public_path('uploads'), $file_name);
//                $file->store('images');
//                $files[]['name'] = $file_name;
                $path = $file->storePubliclyAs('public/ad_images', $file_name);
//                Storage::put('images', $file);
                $files[]['name'] = $file_name;
            }
        }
        return $files;
    }
}
