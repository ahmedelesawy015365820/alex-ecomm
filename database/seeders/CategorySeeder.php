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

        $subCategories = [
            ['name' => ['en'=>'Women\'s T-Shirts','ar'=>'ملابس سيدات'],'slug'=> ['en'=>'Women\'s T-Shirts','ar'=>'ملابس سيدات'],'status' => true,'parent_id' => 1],
            ['name' => ['en'=>'Men\'s T-Shirts','ar'=>'ملابس رجال'],'slug'=> ['en'=>'Men\'s T-Shirts','ar'=>'ملابس رجال'] , 'status' => true,'parent_id' => 1],
            ['name' => ['en'=>'Dresses','ar'=>'ساعات'],'slug'=> ['en'=>'Dresses','ar'=>'فساتين'], 'status' => true ,'parent_id' => 1],
            ['name' => ['en'=>'Novelty','ar'=>'اجهزه'],'slug'=> ['en'=>'Novelty','ar'=>'موبيلات'], 'status' => true ,'parent_id' => 1],

            ['name' => ['en'=>'Women\'s Shoes','ar'=>'احذيه رجال'],'slug'=> ['en'=>'Women\'s Shoes','ar'=>'احذيه رجال'] , 'status' => true,'parent_id' => 2],
            ['name' => ['en'=>'Men\'s Shoes','ar'=>'احذيه سيدات'],'slug'=> ['en'=>'Men\'s Shoes','ar'=>'احذيه سيدات'], 'status' => true ,'parent_id' => 2],

            ['name' => ['en'=> 'Women\'s Watches','ar'=>'ساعات سيدات'], 'slug' => ['en'=>'Women\'s Watches','ar'=>'ساعات سيدات'], 'status' => true , 'parent_id' => 3],
            ['name' => ['en'=>'Men\'s Watches','ar'=>'ساعات رجال'], 'slug' => ['en'=>'Men\'s Watches','ar'=>'ساعات رجال'], 'status' => true , 'parent_id' => 3],

            ['name' => ['en'=>'Electronics','ar'=>'الكترونيات'],'slug' => ['en'=>'Electronics','ar'=>'الكترونيات'] , 'status' => true , 'parent_id' => 4],
            ['name' => ['en'=>'USB Flash drives','ar'=>'كبل كوميوتر '],'slug' => ['en'=>'USB Flash drives','ar'=>'كبل كوميوتر '] , 'status' => true , 'parent_id' => 4],
            ['name' => ['en'=>'Headphones','ar'=>'سمعات'],'slug' => ['en'=>'Headphones','ar'=>'سمعات'] , 'status' => true , 'parent_id' => 4],

            ['name' => ['en'=>'Women\'s sunglasses','ar'=>'نظارات للسيدات'], 'slug' => ['en'=>'Women\'s sunglasses','ar'=>'نظارات للسيدات'], 'status' => true , 'parent_id' => 5],
            ['name' => ['en'=>'Men\'s sunglasses','ar'=>'نظارات للرجال'], 'slug' => ['en'=>'Men\'s sunglasses','ar'=>'نظارات للرجال'], 'status' => true , 'parent_id' => 16],

            ['name' => ['en'=>'Boy\'s Shoes','ar'=>'احذيه للولاد'], 'slug' => ['en'=>'Boy\'s Shoes','ar'=>'احذيه للولاد'], 'status' => true , 'parent_id' => 9],
            ['name' => ['en'=>'Girls\'s Shoes','ar'=>'احذيه للبنات'], 'slug' => ['en'=>'Girls\'s Shoes','ar'=>'احذيه للبنات'], 'status' => true , 'parent_id' => 18],

            ['name' => ['en'=>'Boy\'s Watches','ar'=>' ساعات للولاد'], 'slug' => ['en'=>'Boy\'s Watches','ar'=>' ساعات للولاد'], 'status' => true , 'parent_id' => 11],
            ['name' => ['en'=>'Girls\'s Watches','ar'=>'ساعات للبنات'], 'slug' => ['en'=>'Girls\'s Watches','ar'=>'ساعات للبنات'], 'status' => true , 'parent_id' => 20],

            ['name' => ['en'=>'Portable speakers','ar'=>' سمعات كبيره'], 'slug' => ['en'=>'Portable speakers','ar'=>'سمعات كبيره'], 'status' => true , 'parent_id' => 13],
            ['name' => ['en'=>'Cell Phone bluetooth headsets','ar'=>'سمعات صغيره'], 'slug' => ['en'=>'Cell Phone bluetooth headsets','ar'=>'سمعات صغيره'], 'status' => true , 'parent_id' => 22],

        ];


        foreach($subCategories as $subCategory){

            Category::create([
                'name' => ['en' => $subCategory['name']['en'], 'ar' => $subCategory['name']['ar']],
                'slug' => [
                    'en' => SlugService::createSlug(Category::class,'slug',$subCategory['slug']['en']),
                    'ar' => SlugService::createSlug(Category::class,'slug',$subCategory['slug']['ar'])
                ],
                'status' => $subCategory['status'],
                'parent_id' => $subCategory['parent_id']
            ]);

        }

    }


}
