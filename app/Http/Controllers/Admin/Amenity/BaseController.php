<?php

namespace App\Http\Controllers\Admin\Amenity;

use App\Http\Controllers\Controller;
use App\Services\Admin\Amenity\Service;

class BaseController extends Controller
{
    protected Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
