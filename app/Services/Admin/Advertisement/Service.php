<?php

namespace App\Services\Admin\Advertisement;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Collection;

class Service
{

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
}
