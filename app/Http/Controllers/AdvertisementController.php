<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $advertisements = Advertisement::all();
        return view('advertisement.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $amenities = Amenity::all();
        return view('advertisement.create', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): RedirectResponse
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

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement): View
    {
        $amenities = $advertisement->amenities()->get();
        $files = $advertisement->files()->get();
        return view(
            'advertisement.show',
            compact('advertisement', 'amenities', 'files')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        $amenitiesAll = Amenity::all();
        $amenitiesOfAdvertisement = $advertisement->amenities()->get();
        $files = $advertisement->files()->get();
        return view(
            'advertisement.edit',
            compact('advertisement', 'amenitiesAll', 'amenitiesOfAdvertisement', 'files')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Advertisement $advertisement)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement
            ->amenities()
            ->updateExistingPivot(
                $advertisement->amenities()->allRelatedIds(),
                [
                    'deleted_at' => now()
                ]
            );
        $advertisement->files()->delete();
        $advertisement->delete();
        return redirect()->route('advertisement.index');
    }
}
