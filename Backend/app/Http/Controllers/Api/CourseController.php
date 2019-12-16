<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function __construct()
        {
            $this->middleware('jwt.verify')->except(['index', 'show']);
        }
    /**
     * @OA\Get(
     *     path="/courses",
     *     tags={"Courses"},
     *     summary="List courses",
     *     @OA\Response(
     *          response=200,
     *          description="List of courses",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Course"))
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function index()
    {
        return CourseResource::collection(Course::with('holes')
            ->get())
            ->jsonSerialize();
    }

    /**
     * @OA\Get(
     *     path="/courses/{id}",
     *     tags={"Courses"},
     *     summary="Show a course",
     *     @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="Id course",
     *          ),
     *     @OA\Response(
     *          response=200,
     *          description="A course",
     *          @OA\JsonContent(ref="#/components/schemas/Course")
     *      ),
     *     @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function show(Course $course)
    {
        return CourseResource::collection(Course::with('holes')
            ->where('id', $course->id)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * @OA\Post(
     *     path="/courses",
     *     tags={"Courses"},
     *     summary="Create new course",
     *      @OA\RequestBody(
     *          request="Course",
     *          @OA\JsonContent(ref="#/components/schemas/Course"),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="A newly-created course",
     *          @OA\JsonContent(ref="#/components/schemas/Course")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function store(Request $request)
    {
        $course = Course::create($request->all());
        $course = CourseResource::collection(Course::with('holes')
            ->where('id',$course->id)
            ->get())
            ->jsonSerialize()[0];
        return response()->json($course, 201);
    }


    /**
     * @OA\Patch(
     *     path="/courses/{id}",
     *     tags={"Courses"},
     *     summary="Update course",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id course",
     *      ),
     *      @OA\RequestBody(
     *          request="Course",
     *          @OA\JsonContent(ref="#/components/schemas/Course"),
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="List of courses",
     *          @OA\JsonContent(ref="#/components/schemas/Course")
     *      ),
     *      @OA\Response(
     *          response="default",
     *          description="error",
     *   )
     * ),
     */
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return CourseResource::collection(Course::with('holes')
            ->where('id', $course->id)
            ->get())
            ->jsonSerialize()[0];
    }

    /**
     * @OA\Delete(
     *     path="/courses/{id}",
     *     tags={"Courses"},
     *     summary="Delete course",
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="Id course",
     *       ),
     *     @OA\Response(
     *          response=204,
     *          description="delete a course",
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
