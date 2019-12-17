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
        $this->call([
            UsersTableSeeder::class,
            MinigolfsTableSeeder::class,
            CoursesTableSeeder::class,
            HolesTableSeeder::class,
            GamesTableSeeder::class,
            PlayersTableSeeder::class,
            ScoresTableSeeder::class,
        ]);
    }
}
