<?php

use App\Models\Amenity;
use App\Models\User;

beforeEach(function () {
    $this->adminEmail = 'admin@example.com';
    $this->moderatorEmail = 'moderator@example.com';
    $this->newAmenityTitle = 'fireplace';
    $this->existingAmenityTitle = 'shower';
    $this->existingAdminUser = User::where('email', $this->adminEmail)->first();
    $this->existingModeratorUser = User::where('email', $this->moderatorEmail)->first();
});

it('verifies that the admin user can see the create a new amenity text', function () {
    $this
        ->actingAs($this->existingAdminUser)
        ->get(route('admin.amenity.create'))
        ->assertStatus(200)
        ->assertSee(
            [
                __('Create a new amenity')
            ]
        );
});

it('verifies that the admin user can create a new amenity', function () {
    $this
        ->actingAs($this->existingAdminUser)
        ->post(
            route('admin.amenity.store'),
            [
                'title' => $this->newAmenityTitle
            ]
        )
        ->assertStatus(302);
});

it('verifies that the moderator user can not delete an existing amenity', function () {
    $idOfAmenity = Amenity::where('title', $this->existingAmenityTitle)->first()->id;

    $this
        ->actingAs($this->existingModeratorUser)
        ->delete(route('admin.amenity.delete', $idOfAmenity))
        ->assertStatus(403);
});

it('verifies that the admin user can delete the new amenity', function () {
    $idOfAmenity = Amenity::where('title', $this->newAmenityTitle)->first()->id;

    $this
        ->actingAs($this->existingAdminUser)
        ->delete(
            route(
                'admin.amenity.delete',
                $idOfAmenity
            )
        )
        ->assertStatus(302)
        ->assertRedirect(route('admin.amenity.index'));
});

it('verifies that the moderator user can not create a new amenity', function () {
    $this
        ->actingAs($this->existingModeratorUser)
        ->get(route('admin.amenity.create'))
        ->assertStatus(403);

    $this
        ->actingAs($this->existingModeratorUser)
        ->post(
            route(
                'admin.amenity.store',
                [
                    'title' => $this->newAmenityTitle
                ]
            )
        )
        ->assertStatus(403);
});
