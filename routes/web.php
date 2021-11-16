<?php
use App\Http\Controllers\SemaphoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SemaphoreController::class, 'index']);

Route::get('/getCount', [SemaphoreController::class, 'getCount']);
Route::get('/get/{arr?}', [SemaphoreController::class, 'get']);
Route::get('/semaphore', [SemaphoreController::class, 'semaphore']);