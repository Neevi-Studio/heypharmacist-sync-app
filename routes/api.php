<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DynamicTableController;
use App\Http\Controllers\DynamicPOSSTableController;
use App\Http\Controllers\POS\TransactionController;
use App\Http\Controllers\HTMLToPDFController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(["App\Http\Middleware\DevelopmentMiddleware"])->prefix("v1.0")->group(function () {
    Route::any("patients", [PatientController::class, "index"]);
    Route::any("dynamic/transactions", [TransactionController::class, "index"]);
    Route::any("dynamic/{table}", [DynamicTableController::class, "index"]);
    Route::any("dynamic/poss/{table}", [DynamicPOSSTableController::class, "index"]);
});

Route::middleware(["App\Http\Middleware\PDF2HTMLMiddleware"])->prefix("v1.0")->group(function () {
    Route::any("html/to/pdf", [HTMLToPDFController::class, "convert"]);
});
