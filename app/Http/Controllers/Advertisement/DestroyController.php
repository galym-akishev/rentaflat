<?php

namespace App\Http\Controllers\Advertisement;

use App\Models\Advertisement;

class DestroyController extends BaseController
{
    public function __invoke(Advertisement $advertisement)
    {
        $this->authorize('delete', $advertisement);

        $this->service->destroy($advertisement);

        return redirect()->route('advertisement.index');
    }
}
