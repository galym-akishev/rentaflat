<?php

use App\Models\User;

it('verifies essential requirements for an authenticated user', function () {
    $existingUser = User::where('email', 'user1@example.com')->first();

    $this
        ->actingAs($existingUser)
        ->get(route('home.index'))
        ->assertStatus(200)
        ->assertSee(
            [
                __('Your published and not-published advertisements'),
                __('Home'),
                __('Listings'),
                __('Create Ad'),
                $existingUser->name
            ]
        );
});

it('verifies redirect for a non-authenticated user to the login page', function () {
    $this
        ->get(route('home.index'))
        ->assertRedirect(route('login'))
        ->assertStatus(302);
});
