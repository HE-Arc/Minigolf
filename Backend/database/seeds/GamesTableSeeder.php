<?php

use Illuminate\Database\Seeder;
use App\Game;
use App\User;
use App\Course;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all('id')->pluck('id')->toArray();
        $course_ids = Course::all('id')->pluck('id')->toArray();
        foreach ($course_ids as $id) {
            $user_id = $user_ids[random_int(1,count($user_ids)-1)];
            $course_id = $id;
            $this->createGameForCourseUser($user_id, $course_id);
        }

        foreach (range(0, random_int(0,200)) as $item) {
            $course_id = $course_ids[random_int(1,count($course_ids)-1)];
            $user_id = $user_ids[random_int(1,count($user_ids)-1)];
            $this->createGameForCourseUser($user_id, $course_id);
        }
    }

    private function createGameForCourseUser($user_id, $course_id)
    {
        factory(Game::class)->create([
            'user_id' => $user_id,
            'course_id' => $course_id
        ]);
    }
}
