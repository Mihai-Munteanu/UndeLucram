<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class CreateSocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->socialMedias()
            ->each(function($media) {
                SocialMedia::firstOrCreate([
                    'name' => $media,
                ]);
            });
    }

    public function socialMedias()
    {
        return collect(['facebook', 'twitter']);
    }
}
