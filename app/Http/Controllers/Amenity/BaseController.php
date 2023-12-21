<?php

namespace App\Http\Controllers\Amenity;

use App\Http\Controllers\Controller;
use App\Services\Amenity\Service;

class BaseController extends Controller
{
    protected Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
