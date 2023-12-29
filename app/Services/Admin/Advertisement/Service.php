<?php

namespace App\Services\Admin\Advertisement;

use App\Constants\PaginationConstants;
use App\Enums\PublishedStatusEnum;
use App\Http\Filters\AdvertisementFilter;
use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Collection;

class Service
{
    public function makeFilterOnData(array $data)
    {
        return app()->make(AdvertisementFilter::class, ['queryParams' => array_filter($data)]);
    }

    public function getPaginatedAdvertisementsWithFilter(AdvertisementFilter $filter)
    {
        return Advertisement::filter($filter)->paginate(PaginationConstants::ADVERTISEMENTS_PER_PAGE);
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

    public function update(Advertisement $advertisement, $data): void
    {
        $advertisement->update($data);
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

    public function getArrayOfPublishedStatuses(): array
    {
        return array_column(PublishedStatusEnum::cases(), 'value');
    }
}
