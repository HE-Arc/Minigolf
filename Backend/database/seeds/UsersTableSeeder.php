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
            'role' => 'staff',
            'email' => 'admin@test.com',
        ]);

        factory(User::class)->create([
            'name' => 'nath',
            'role' => 'staff',
            'email' => 'nath@test.com',
        ]);

        factory(User::class, 50)->create();
    }
}
