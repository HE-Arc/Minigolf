<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $faker = \Faker\Factory::create();
        $password = Hash::make('toptal00');

        User::create([
            'name' => 'admin',
            'permission' => 'staff',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        User::create([
            'name' => 'nath',
            'permission' => 'staff',
            'email' => 'nath@test.com',
            'password' => $password,
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
