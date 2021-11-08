<?php

namespace Database\Seeders;

use App\Models\ListGroup;
use Illuminate\Database\Seeder;

class CreateListGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            $listGroup = ListGroup::firstOrCreate([
                'name' => "lista {$i}",
            ]);

            $listGroup ->save();

            $listGroup->user()->sync([
                rand(1, 100),
                rand(1, 100),
                rand(1, 100),
                rand(1, 100),
                rand(1, 100),
                rand(1, 100),
                rand(1, 100),
                rand(1, 100),
                rand(1, 100),
                rand(1, 100),
            ]);
        }
    }
}
