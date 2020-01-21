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
            'name' => "Noirmont minigolf",
            'description' => "Minigolf du Noirmont",
            'city' => "Le Noirmont",
            'address' => "Sol street",
            'zipcode' => "2340",
            'phone' => "0324527627",
            'email' => "noirmont@email.com",
            'lat' => 47.225581,
            'long' => 6.958848
        ]);

        factory(Minigolf::class)->create([
            'name' => "He-Arc Minigolf",
            'description' => "Minigolf de l'he-arc",
            'city' => "Neuchâtel",
            'address' => "Sol street",
            'zipcode' => "2000",
            'phone' => "0324527627",
            'email' => "ingenierie@he-arc.ch",
            'lat' => 46.997613,
            'long' => 6.938587
        ]);
    }
}
