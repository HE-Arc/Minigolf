<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 * @OA\Info(
 *      title="IGolf Api",
 *      version="1.0",
 *       @OA\Contact(name="Nathan Latino",email="nathan.latino@gmail.com"),
 *       @OA\License(name="Unlicense"),
 *  ),
 *  @OA\PathItem(path="/api", @OA\Response(response="default"))
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
