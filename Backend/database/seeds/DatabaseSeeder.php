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
        $this->call(UsersTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(HolesTableSeeder::class);
        $this->call(MinigolfsTableSeeder::class);
        $this->call(PartiesTableSeeder::class);
//        $this->call(SwipesTableSeeder::class);
    }
}
