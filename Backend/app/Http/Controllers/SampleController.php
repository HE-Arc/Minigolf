<?php

namespace App\Http\Controllers;
/**
 * @SWG\Swagger(
 *   basePath="/api",
 *   @SWG\Info(
 *     title="Core API",
 *     version="1.0.0"
 *   )
 * )
 */

use Illuminate\Http\Request;

class SampleController extends Controller
{

    // app/Http/Controllers/SampleController.php
    /**
     * @SWG\Get(
     *   path="/api/users",
     *   summary="User",
     *   @SWG\Response(response=200, description="successful operation")
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json('Ok');
    }
}
