<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class DestroyController extends Controller
{
    public function __invoke(Advertisement $advertisement)
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
        return redirect()->route('advertisement.index');
    }
}
