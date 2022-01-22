<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PremissonSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CategorySeeder::class);
    }
}