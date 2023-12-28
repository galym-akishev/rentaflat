<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    public function __invoke(Advertisement $advertisement)
    {
        $this->authorize('delete', $advertisement);

        $this->service->destroy($advertisement);

        return redirect()->route('admin.advertisement.index');
    }
}
