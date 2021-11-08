<?php

namespace Database\Seeders;

use App\Models\Account;
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

        User::factory()->count(100)->create()->each(function($author) {

            Account::factory()
                ->count(10)
                ->hasPosts(10)
                ->for($author, 'author')
                ->create();
        });

        $this->call([
            CreateListGroupSeeder::class,
        ]);
    }
}
