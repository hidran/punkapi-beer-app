<?php

use App\Http\Controllers\BeerController;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('beers', [BeerController::class, 'index'])->name('beers');
    Route::get('beers/{id}', [BeerController::class, 'show'])->name('getBeer');
}
);


