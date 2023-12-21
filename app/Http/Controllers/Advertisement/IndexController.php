<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class IndexController extends Controller
{
    public function __invoke()
    {
        $advertisements = Advertisement::all();
        return view('advertisement.index', compact('advertisements'));
    }
}
