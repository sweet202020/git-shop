<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $product = new Product;
            $product->name = $faker->sentence(3);
            $product->description = $faker->text(255);
            $product->price = $faker->randomFloat(2);
            $product->save();
        }
    }
}
