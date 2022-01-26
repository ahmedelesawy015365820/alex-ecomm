<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 100; $i++) {
            $products[] = [
                'name'                  => ['en' => $faker->sentence(2, true), "ar" => $faker->sentence(2, true)],
                'slug'                  => ['en' => SlugService::createSlug(Product::class,'slug',$faker->unique()->slug(2, true)),
                                            'ar' => SlugService::createSlug(Product::class,'slug',$faker->unique()->slug(2, true))],
                'description'           => ['en'=> $faker->paragraph,'ar' => $faker->paragraph],
                'price'                 => $faker->numberBetween(5, 200),
                'quantity'              => $faker->numberBetween(10, 100),
                'status'                => true,
                'category_id'           => 1,
                'subcategory_id'        => 5,
                'child_id'              => 16,
                'subchild_id'           => 17,
                'created_at'            => now(),
                'updated_at'            => now(),
            ];

        }

        foreach ($products as $product) {
            Product::create($product);
        }

        for ($i = 1; $i <= 100; $i++) {
            $subcats[] = [
                'name'                  => ['en' => $faker->sentence(2, true), "ar" => $faker->sentence(2, true)],
                'slug'                  => ['en' => SlugService::createSlug(Product::class,'slug',$faker->unique()->slug(2, true)),
                                            'ar' => SlugService::createSlug(Product::class,'slug',$faker->unique()->slug(2, true))],
                'description'           => ['en'=> $faker->paragraph,'ar' => $faker->paragraph],
                'price'                 => $faker->numberBetween(5, 200),
                'quantity'              => $faker->numberBetween(10, 100),
                'status'                => true,
                'category_id'           => 2,
                'subcategory_id'        => 9,
                'child_id'              => 18,
                'subchild_id'           => 19,
                'created_at'            => now(),
                'updated_at'            => now(),
            ];

        }

        foreach ($subcats as $subcat) {
            Product::create($subcat);
        }

        for ($i = 1; $i <= 100; $i++) {
            $childs[] = [
                'name'                  => ['en' => $faker->sentence(2, true), "ar" => $faker->sentence(2, true)],
                'slug'                  => ['en' => SlugService::createSlug(Product::class,'slug',$faker->unique()->slug(2, true)),
                                            'ar' => SlugService::createSlug(Product::class,'slug',$faker->unique()->slug(2, true))],
                'description'           => ['en'=> $faker->paragraph,'ar' => $faker->paragraph],
                'price'                 => $faker->numberBetween(5, 200),
                'quantity'              => $faker->numberBetween(10, 100),
                'status'                => true,
                'category_id'           => 3,
                'subcategory_id'        => 11,
                'child_id'              => 20,
                'subchild_id'           => 21,
                'created_at'            => now(),
                'updated_at'            => now(),
            ];

        }

        foreach ($childs as $child) {
            Product::create($child);
        }

        for ($i = 1; $i <= 100; $i++) {
            $subchilds[] = [
                'name'                  => ['en' => $faker->sentence(2, true), "ar" => $faker->sentence(2, true)],
                'slug'                  => ['en' => SlugService::createSlug(Product::class,'slug',$faker->unique()->slug(2, true)),
                                            'ar' => SlugService::createSlug(Product::class,'slug',$faker->unique()->slug(2, true))],
                'description'           => ['en'=> $faker->paragraph,'ar' => $faker->paragraph],
                'price'                 => $faker->numberBetween(5, 200),
                'quantity'              => $faker->numberBetween(10, 100),
                'status'                => true,
                'category_id'           => 3,
                'subcategory_id'        => 11,
                'child_id'              => 20,
                'subchild_id'           => 21,
                'created_at'            => now(),
                'updated_at'            => now(),
            ];

        }

        foreach ($subchilds as $subchild) {
            Product::create($subchild);
        }

    }
}
