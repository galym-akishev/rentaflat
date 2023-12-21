<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class UpdateController extends Controller
{
    public function __invoke(Advertisement $advertisement)
    {
        $data = request()->validate(
            [
                'title' => 'string',
                'description' => 'string',
                'price' => 'string',
                'amenities' => 'array',
                'amenities.*' => 'string',
                'files' => 'nullable',
                'files.*' => 'nullable|mimes:jpeg,bmp,png,jpg|max:2048'
            ]
        );
        $files = [];
        if (request()->file('files')) {
            foreach (request()->file('files') as $key => $file) {
                $file_name = time() . rand(1, 99) . '.' . $file->extension();
                $file->move(public_path('uploads'), $file_name);
                $files[]['name'] = $file_name;
            }
        }
        $advertisement->update($data);
        if (!empty($files))
        {
            $advertisement->files()->delete();
            $advertisement->files()->createMany($files);
        }
        if (!empty($data['amenities'])) {
            $advertisement->amenities()->sync($data['amenities']);
        } else {
            $advertisement->amenities()->sync([]);
        }
        $advertisement
            ->amenities()
            ->updateExistingPivot(
                $advertisement->amenities()->allRelatedIds(),
                [
                    'updated_at' => now()
                ]
            );
        return redirect()->route('advertisement.show', $advertisement->id);
    }
}
