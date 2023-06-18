<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //\App\Models\Listing::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Tyson Bernard',
            'email' => 'tyson@example.com'
        ]);

        Listing::factory(3)->create([
            'user_id' => $user->id
        ]);

        $user = User::factory()->create([
            'name' => 'Jambolt Bernard',
            'email' => 'jambolt@example.com'
        ]);

        Listing::factory(3)->create([
            'user_id' => $user->id
        ]);
    }
}
