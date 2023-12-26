<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Amenity\BaseController;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('home.index');
    }
}
