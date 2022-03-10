<?php

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
        // $this->call(UserSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        // without the above line you would have to run
        // php artisan db:seed --class=CategoriesTableSeeder
    }
}
