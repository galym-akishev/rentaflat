<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class ShowController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $amenities = $advertisement->amenities()->get();
        $files = $advertisement->files()->get();
        return view(
            'advertisement.show',
            compact('advertisement', 'amenities', 'files')
        );
    }
}
