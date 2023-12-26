<?php

namespace App\Http\Controllers\Home;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $advertisements = $this->service->getAllAdvertisementsOfAuthenticatedUser();
//        dd($advertisements);
        return view('home.index', compact('advertisements'));
    }
}
