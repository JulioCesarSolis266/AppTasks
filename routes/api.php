<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CompaniesController;
use App\Http\Controllers\Api\V1\BranchesController;
use App\Http\Controllers\Api\V1\CoordinatorController;
use App\Http\Controllers\Api\V1\TasksController;
use App\Http\Controllers\Api\V1\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/V1/companies', CompaniesController::class);

Route::apiResource('/V1/branches', BranchesController::class);

Route::apiResource('/V1/coordinators', CoordinatorController::class);

Route::apiResource('/V1/tasks', TasksController::class);

Route::apiResource('/V1/users', UsersController::class);
<<<<<<< HEAD

Route::apiResource('/V1/login', RolesController::class);
=======
>>>>>>> main
