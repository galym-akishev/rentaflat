<?php

use App\Models\Advertisement;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->existingRegularUser = User::where('email', 'user1@example.com')->first();

    $this->advertisementDetails = [
        'title' => 'New test advertisement by User 1',
        'description' => 'Description of the new test advertisement',
        'amenities' => ['1', '2'],
        'price' => '50',
        'phone' => '+712345678'
    ];
});

it('verifies that the regular user can create a new advertisement', function () {
    Storage::fake('photos');
    $imagesForAdvertisement = [
        'files' => [
            UploadedFile::fake()->image('photo1.png'),
            UploadedFile::fake()->image('photo2.png')
        ]
    ];

    $this
        ->actingAs($this->existingRegularUser)
        ->call(
            'POST',
            route('advertisement.store'),
            $this->advertisementDetails,
            [],
            $imagesForAdvertisement
        );

    $this
        ->assertDatabaseHas('advertisements', [
            'title' => $this->advertisementDetails['title'],
            'description' => $this->advertisementDetails['description'],
            'price' => $this->advertisementDetails['price'],
            'phone' => $this->advertisementDetails['phone'],
        ]);

    $createdAdvertisement = Advertisement::where('title', $this->advertisementDetails['title'])->first();
    $attachedImages = File::where('advertisement_id', $createdAdvertisement->id)->get();

    $this
        ->assertEquals(
            count($imagesForAdvertisement['files']),
            count($attachedImages)
        );

    $createdAdvertisement->forceDelete();
});
