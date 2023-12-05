<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CompaniesController;
use App\Http\Controllers\Api\V1\BranchesController;
use App\Http\Controllers\Api\V1\CoordinatorController;
use App\Http\Controllers\Api\V1\TitlesController;
use App\Http\Controllers\Api\V1\PositionsController;
use App\Http\Controllers\Api\V1\TaskPrioritiesController;
use App\Http\Controllers\Api\V1\TasksController;
use App\Http\Controllers\Api\V1\TaskStatusController;
use App\Http\Controllers\Api\V1\UsersController;
use App\Http\Controllers\Api\V1\EmployeesController;
use App\Http\Controllers\Api\V1\RolesController;
use App\Http\Controllers\Api\V1\ClientsController;
use App\Http\Controllers\Api\V1\GenresController;
use App\Http\Controllers\Api\V1\CostsController;


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Auth\Events\Authenticated;
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
//-------------------------------------------------------------------

Route::apiResource('/V1/roles', RolesController::class);

Route::apiResource('/V1/titles', TitlesController::class);

Route::apiResource('/V1/positions', PositionsController::class);
//----------------------------------------------------------------------

Route::apiResource('/V1/taskstatuses', TaskStatusController::class);
Route::apiResource('/V1/taskpriorities', TaskPrioritiesController::class);

Route::apiResource('/V1/priorities', TaskPrioritiesController::class);
Route::apiResource('/V1/statuses', TaskStatusController::class);

Route::apiResource('/V1/genres', GenresController::class);

Route::apiResource('/V1/employees', EmployeesController::class);

Route::apiResource('/V1/clients', ClientsController::class);

//----------------------------------------------------------------------
Route::apiResource('/V1/tasks', TasksController::class);
Route::get('V1/employees/{employeeId}/tasks',  [EmployeesController::class, 'task']);
Route::get('V1/clients/{clientId}/tasks',  [ClientsController::class, 'task']);
//----------------------------------------------------------------------

Route::apiResource('/V1/users', UsersController::class);

Route::apiResource('/V1/costs', CostsController::class);

Route::post('/V1/login', [AuthenticatedSessionController::class, 'login']);

Route::get('csrf-cookie', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});
