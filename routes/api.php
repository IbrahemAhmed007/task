<?php

use App\Http\Controllers\Api\ProductsController;
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

Route::prefix('/')->namespace('App\Http\Controllers\Api')
    ->group(function () {

        Route::prefix('products/')
            ->group(function () {
                Route::name('api.products.list')->get('/', [ProductsController::class, 'list']);
            });

    });
