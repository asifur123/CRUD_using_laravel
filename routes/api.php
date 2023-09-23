<?php

use App\Http\Controllers\PatientApiController;
use Illuminate\Http\Request;
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

Route::get('/view-data',[PatientApiController::class,'showApiData']);
Route::get('/add-data',[PatientApiController::class,'addApiData']);
Route::post('/store-data',[PatientApiController::class,'storeApiData']);
Route::get('/edit-data/{id}',[PatientApiController::class,'editApiData']);
Route::post('/update-data/{id}',[PatientApiController::class,'updateApiData']);
Route::get('/delete-data/{id}',[PatientApiController::class,'deleteApiData']);
