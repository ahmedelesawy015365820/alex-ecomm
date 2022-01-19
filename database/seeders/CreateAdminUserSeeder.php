<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'ahmed',
            'last_name' => 'elesawy',
            'username' => 'elesawy20',
            'email' => 'ahmed.elesawy202020@gmail.com',
            'password' => bcrypt('015365820'),
            'roles_name' => 'SuperAdmin',
            'auth' => 1,
            'image'  => 'ahmed.jpg'
        ]);

            $role = Role::create(['name' => 'SuperAdmin']);
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
            $user->assignRole([$role->id]);
    }
}