<?php

namespace App\Http\Controllers\Api\V1\Advertisement;

use App\Http\Controllers\Controller;
use App\Services\Advertisement\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected Service $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
