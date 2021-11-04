<?php

namespace Database\Seeders;

use App\Models\ListGroup;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CreateSocialMediaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateSocialMediaSeeder::class,
        ]);

        User::factory()
            ->count(100)
            ->hasPosts(100)
            ->create();

        $this->call([
            CreateListGroupSeeder::class,
        ]);
    }
}
