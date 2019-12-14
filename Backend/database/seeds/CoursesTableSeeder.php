<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Minigolf;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minigolf_ids = Minigolf::all('id')->pluck('id')->toArray();
        foreach ($minigolf_ids as $id){
            $this->createCourseForMinigolfId($id);
        }
    }


    /**
     * @param $minigolf_id
     * @return void
     */
    private function createCourseForMinigolfId($minigolf_id)
    {
        $amount = random_int(1, 3);
        factory(Course::class, $amount)->create([
            'minigolf_id' => $minigolf_id
        ]);
    }
}
