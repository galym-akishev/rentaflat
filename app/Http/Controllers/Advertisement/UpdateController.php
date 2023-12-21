<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Requests\Advertisement\UpdateRequest;
use App\Models\Advertisement;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Advertisement $advertisement)
    {
        $data = $request->validated();
        $this->service->update($advertisement, $data);

        return redirect()->route('advertisement.show', $advertisement->id);
    }
}
