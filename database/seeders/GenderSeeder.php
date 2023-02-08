<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'gender_id' => 1,
                'gender_desc' => 'female'
            ],
            [
                'gender_id' => 2,
                'gender_desc' => 'male'
            ],
        ])->each(function ($item) {
            Gender::create($item);
        });
    }
}
