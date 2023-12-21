<?php

namespace App\Http\Controllers\Advertisement;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate(
            [
                'title' => 'string',
                'description' => 'string',
                'price' => 'string',
                'amenities' => 'array',
                'amenities.*' => 'string',
                'files' => 'required',
                'files.*' => 'required|mimes:jpeg,bmp,png,jpg|max:2048'
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
        if (!empty($data['amenities'])) {
            $advertisement = Advertisement::create($data);
            $advertisement->amenities()->attach($data['amenities']);
        } else {
            $advertisement = Advertisement::create($data);
        }
        $advertisement->files()->createMany($files);
        $advertisement
            ->amenities()
            ->updateExistingPivot(
                $advertisement->amenities()->allRelatedIds(),
                [
                    'created_at' => now()
                ]
            );
        return redirect()->route('advertisement.index');
    }
}
