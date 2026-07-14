<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "API Praktikum Web II",
    description: "L5 Swagger OpenApi API Documentation",
)]
#[OA\Server(
    url: "http://localhost:8000",
    description: "Demo API Server"
)]
abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
