<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
                'role_id' => 1,
                'role_name' => 'user'
            ],
            [
                'role_id' => 2,
                'role_name' => 'admin'
            ],
        ])->each(function ($item) {
            Role::create($item);
        });
    }
}
