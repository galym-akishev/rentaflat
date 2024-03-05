<?php

use App\Models\User;

beforeEach(function () {
    $this
        ->registrationDetails =
        [
            'name' => 'test_user',
            'email' => 'test_user@example.com',
            'password' => '123456789',
            'password_confirmation' => '123456789'
        ];
});

it('verifies essential requirements', function () {
    $this
        ->get(route('register'))
        ->assertStatus(200)
        ->assertSeeText(
            [
                __('Register'),
                __('Name'),
                __('Email Address'),
                __('Password'),
                __('Confirm Password')
            ]
        );
});

it('generates errors if registration details are not provided', function () {
    $this
        ->post(route('register'))
        ->assertSessionHasErrors(
            [
                'name',
                'email',
                'password'
            ]
        );
});

it('can register a new user with valid credentials', function () {
    $this
        ->post(route('register', $this->registrationDetails))
        ->assertRedirect(route('home.index'));
    $this
        ->assertDatabaseHas('users', [
            'name' => $this->registrationDetails['name'],
            'email' => $this->registrationDetails['email']
        ])
        ->assertAuthenticated();
});

it('can not register with an already existing credentials', function () {
    $this
        ->post(route('register', $this->registrationDetails))
        ->assertSessionHasErrors();

    User::where('email', $this->registrationDetails['email'])
        ->forceDelete();
});
