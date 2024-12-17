<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     title="ChePanel - API Documentation",
 *     version="0.1",
 *
 *      @OA\Contact(
 *          email="info@chepanel.com"
 *      ),
 * )
 */
class ApiController extends BaseController
{
    //  use AuthorizesRequests, ValidatesRequests;
    use ValidatesRequests;
}
