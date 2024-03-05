<?php

it('verifies essential requirements', function () {
    $this
        ->get(route('welcome'))
        ->assertStatus(200)
        ->assertSeeText(
            [
                __('Rentaflat'),
                __('Login'),
                __('Register'),
                __('Listings'),
                __('Welcome to Rentaflat!'),
                __('Rentaflat is a web application for rental advertisements.')
            ]
        );
});
