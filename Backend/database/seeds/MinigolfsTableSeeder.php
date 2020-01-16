<?php

use Illuminate\Database\Seeder;
use App\Minigolf;

class MinigolfsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Minigolf::class, 30)->create();

        factory(Minigolf::class)->create([
            'name' => "He-Arc Minigolf",
            'description' => "Minigolf de l'he-arc",
            'city' => "Neuchâtel",
            'address' => "Sol street",
            'zipcode' => "2010",
            'phone' => "0324527627",
            'email' => "fake@email.com",
            'lat' => 47.225581,
            'long' => 6.958848
        ]);
    }
}
