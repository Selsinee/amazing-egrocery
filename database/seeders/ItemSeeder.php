<?php

namespace Database\Seeders;

use App\Models\Item;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(array_map(function() {
            return $this->getData();
        }, array_fill(0, 12, null)))
        ->each(function ($item) {
            Item::create($item);
        });
    }

    private function getData() {
        $faker = Factory::create();
        return [
            "item_name" => $faker->word(),
            "item_desc"=> $faker->paragraph(1),
            "item_image"=> 'product.jpg',
            "price" => $faker->numberBetween(1000, 1000000),
        ];
    }

}
