<?php

namespace App\Http\Controllers\Advertisement;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $advertisements = $this->service->getAllAdvertisements();

        return view('advertisement.index', compact('advertisements'));
    }
}
