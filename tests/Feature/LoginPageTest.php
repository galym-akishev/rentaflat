<?php

beforeEach(function () {
    $this
        ->validCredentials =
        [
            'email' => 'user1@example.com',
            'password' => '123456789'
        ];
    $this
        ->invalidCredentials =
        [
            'email' => 'user_invalid@example.com',
            'password' => '123456789'
        ];
});

it('verifies essential requirements', function () {
    $this
        ->get(route('login'))
        ->assertStatus(200)
        ->assertSeeText(
            [
                __('Login'),
                __('Email Address'),
                __('Password'),
                __('Remember Me'),
                __('Forgot Your Password?')
            ]
        );
});

it('verifies that the existing user can login with valid credentials', function () {
    $this
        ->post(route('login', $this->validCredentials))
        ->assertStatus(302)
        ->assertRedirect(route('home.index'));
    $this
        ->assertAuthenticated();
});

it('verifies that it is not possible to login with invalid credentials', function () {
    $this
        ->post(route('login', $this->invalidCredentials))
        ->assertSessionHasErrors();
});
