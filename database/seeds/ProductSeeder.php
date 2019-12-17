<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 2000; $i++) {
            Product::create([
                'name' => $faker->name,
                'count' => rand(10, 1000)
            ]);
        }
    }
}
