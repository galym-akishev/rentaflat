<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\UserRolesEnum;
use App\Models\Amenity;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '123456789',
            'role' => UserRolesEnum::ADMIN->value

        ]);
        User::factory()->create([
            'name' => 'moderator',
            'email' => 'moderator@example.com',
            'password' => '123456789',
            'role' => UserRolesEnum::MODERATOR->value

        ]);
        User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => '123456789',
            'role' => UserRolesEnum::USER->value
        ]);
        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => '123456789',
            'role' => UserRolesEnum::USER->value
        ]);

        Amenity::factory()->create([
            'title' => 'towels',
        ]);
        Amenity::factory()->create([
            'title' => 'sofa',
        ]);
        Amenity::factory()->create([
            'title' => 'air conditioning',
        ]);
        Amenity::factory()->create([
            'title' => 'tables',
        ]);
        Amenity::factory()->create([
            'title' => 'shower',
        ]);
    }
}
