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
        factory(User::class)->create([
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@test.com',
        ]);

        factory(User::class)->create([
            'name' => 'staff',
            'role' => 'staff',
            'email' => 'staff@test.com',
        ]);

        factory(User::class)->create([
            'name' => 'user',
            'role' => 'user',
            'email' => 'user@test.com',
        ]);

        factory(User::class)->create([
            'name' => 'nath',
            'role' => 'admin',
            'email' => 'nath@test.com',
        ]);

        factory(User::class)->create([
            'name' => 'Pierre',
            'email' => 'pierre@test.com',
        ]);

        factory(User::class)->create([
            'name' => 'Sol',
            'email' => 'sol@test.com',
        ]);

        factory(User::class)->create([
            'name' => 'David',
            'email' => 'david@test.com',
        ]);


        factory(User::class, 50)->create();
    }
}
