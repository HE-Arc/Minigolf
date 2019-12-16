<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;



class CourseController extends Controller
{
    /**
     * @OA\Get(
     *     path="/courses",
     *     tags={"Courses"},
     *     summary="List courses",
     *     @OA\Response(
     *          response=200,
     *          description="List of courses",
     *          @OA\Schema(ref="#/definitions/Course")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function index()
    {
        return CourseResource::collection(Course::with('holes')
            ->get())
            ->jsonSerialize();
    }

    /**
     * @OA\Post(
     *     path="/courses",
     *     tags={"Courses"},
     *     summary="Create new course",
     *     @OA\Parameter(
     *                  name="id",
     *                  in="query",
     *          schema={"$ref": "#/definitions/Course"},
     *                      required=true,
     *                      description="UUID",
     *          ),
     *     @OA\Response(
     *          response=201,
     *          description="A newly-created course",
     *          @OA\Schema(ref="#/definitions/Course")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    /**
     * @OA\Get(
     *     path="/courses/{$id}",
     *     tags={"Courses"},
     *     summary="Show a course",
     *     @OA\Response(
     *          response=200,
     *          description="An courses",
     *          @OA\Schema(ref="#/shema/Course")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function show(Course $course)
    {
        return CourseResource::collection(Course::with('holes')
            ->where('id', '=', $course->id)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * @OA\Post(
     *     path="/courses/{id}",
     *     tags={"Courses"},
     *     summary="Update course",
     *     @OA\Response(
     *          response=200,
     *          description="List of courses",
     *          @OA\Schema(ref="#/definitions/Course")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return $course;
    }

    /**
     * @OA\Delete(
     *     path="/courses/{id}",
     *     tags={"Courses"},
     *     summary="Delete course",
     *     @OA\Response(
     *          response=204,
     *          description="delete a course",
     *          @OA\Schema(ref="#/definitions/Course")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * )
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}
