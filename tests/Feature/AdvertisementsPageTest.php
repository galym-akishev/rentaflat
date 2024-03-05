<?php

use App\Models\Advertisement;

beforeEach(function () {
    $this->advertisementWithPublishedStatus = [
        'user_id' => '3',
        'published' => true,
        'title' => 'New test advertisement',
        'description' => 'Description of the new test advertisement',
        'price' => '60',
        'phone' => '+712345678'
    ];
});

it('verifies essential requirements', function () {
    $this
        ->get(route('advertisement.index'))
        ->assertStatus(200)
        ->assertSeeText(
            [
                __('Listing of advertisements'),
                __('Rentaflat')
            ]
        );
});

it('verifies that a new advertisement is observed in the listings page', function () {
    Advertisement::create($this->advertisementWithPublishedStatus);

    $this
        ->get(route('advertisement.index'))
        ->assertStatus(200)
        ->assertSee(
            [
                $this->advertisementWithPublishedStatus['title'],
                $this->advertisementWithPublishedStatus['description'],
                $this->advertisementWithPublishedStatus['price']
            ]
        );

    Advertisement::where('title', $this->advertisementWithPublishedStatus['title'])->forceDelete();
});

it('verifies that a new advertisement is observed in the detail page', function () {
    Advertisement::create($this->advertisementWithPublishedStatus);
    $idOfAdvertisement
        = Advertisement::where('title', $this->advertisementWithPublishedStatus['title'])
        ->first()
        ->id;

    $this
        ->get(route('advertisement.show', $idOfAdvertisement))
        ->assertStatus(200)
        ->assertSee(
            [
                $this->advertisementWithPublishedStatus['user_id'],
                $this->advertisementWithPublishedStatus['title'],
                $this->advertisementWithPublishedStatus['description'],
                $this->advertisementWithPublishedStatus['price'],
                $this->advertisementWithPublishedStatus['phone']
            ]
        );

    Advertisement::where('title', $this->advertisementWithPublishedStatus['title'])->forceDelete();
});
