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
            'user',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'Permission-list',
            'Permission-show',
            'Permission-create',
            'Permission-edit',
            'Permission-delete',
            ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}