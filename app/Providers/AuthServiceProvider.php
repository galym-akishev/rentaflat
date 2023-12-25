<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Amenity;
use App\Models\User;
use App\Policies\AdminPolicy;
use App\Policies\AmenityPolicy;
use App\Policies\ModeratorPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => AdminPolicy::class,
        Amenity::class => AmenityPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
