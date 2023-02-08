<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        collect([
            [
                'role_id' => 1,
                'gender_id' => 1,
                'first_name' => $faker->firstNameFemale(),
                'last_name' => $faker->lastName(),
                'email' => 'user@gmail.com',
                'display_picture_link' => 'profile.jpg',
                'password' => bcrypt('12345678')
            ],
            [
                'role_id' => 2,
                'gender_id' => 2,
                'first_name' => $faker->firstNameMale(),
                'last_name' => $faker->lastName(),
                'email' => 'admin@gmail.com',
                'display_picture_link' => 'profile2.jpg',
                'password' => bcrypt('12345678')
            ],
        ])->each(function ($item) {
            User::create($item);
        });
    }
}
