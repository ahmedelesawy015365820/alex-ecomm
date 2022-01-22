<?php

namespace Database\Seeders;

use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories =[
            ['name' => ['en'=>'Clothes','ar'=>'ملابس'],'slug'=> ['en'=>'Clothes','ar'=>'ملابس'],'status' => true],
            ['name' => ['en'=>'Shoes','ar'=>'احذيه'],'slug'=> ['en'=>'Shoes','ar'=>'احذيه'] , 'status' => true],
            ['name' => ['en'=>'Watches','ar'=>'ساعات'],'slug'=> ['en'=>'Watches','ar'=>'ساعات'], 'status' => true],
            ['name' => ['en'=>'Electronics','ar'=>'اجهزه'],'slug'=> ['en'=>'Electronics','ar'=>'اجهزه'], 'status' => true],
        ];

        foreach($categories as $category){

            Category::create([
                'name' => ['en' => $category['name']['en'], 'ar' => $category['name']['ar']],
                'slug' => [
                    'en' => SlugService::createSlug(Category::class,'slug',$category['slug']['en']),
                    'ar' => SlugService::createSlug(Category::class,'slug',$category['slug']['ar'])
                ],
                'status' => $category['status']
            ]);

        }

    }

}
