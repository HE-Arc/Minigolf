<?php

use Illuminate\Database\Seeder;
use App\Hole;
use App\Course;

class HolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_ids = Course::all('id')->pluck('id')->toArray();
        foreach ($course_ids as $id) {
            $this->createHoleForCourseId($id);
        }
    }

    private function createHoleForCourseId($course_id)
    {
        foreach (range(1, 12) as $num) {
            factory(Hole::class)->create([
                'course_id' => $course_id,
                'number' => $num
            ]);
        }
    }
}
