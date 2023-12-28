<?php

namespace App\Http\Controllers\Admin\Advertisement;

use App\Http\Requests\Admin\Advertisement\UpdateRequest;
use App\Models\Advertisement;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Advertisement $advertisement)
    {
        $this->authorize('update', $advertisement);

        $data = $request->validated();
        $this->service->update($advertisement, $data);

        return redirect()->route('admin.advertisement.show', $advertisement);
    }
}
