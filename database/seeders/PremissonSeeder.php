<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PremissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'Permission-list',
            'Permission-show',
            'Permission-create',
            'Permission-edit',
            'Permission-delete',
            'Category-list',
            'Category-create',
            'Category-edit',
            'Category-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'review-list',
            'review-show',
            'review-edit',
            'review-delete'
            ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}