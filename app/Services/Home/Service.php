<?php

namespace App\Services\Home;

class Service
{
    public function getAllAdvertisementsOfAuthenticatedUser()
    {
        return auth()->user()->advertisements()->get();
    }
}
