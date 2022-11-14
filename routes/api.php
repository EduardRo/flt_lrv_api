<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\api\V1\CustomerController;


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

// api fara authetication pentru test flutter
//Route::get('/customerstest',[CustomerController::class,'customertest']);

/*
Route::apiResource('customers', CustomerController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

*/
// api/v1/customers

Route::group([
    'prefix'=>'v1', 
    'namespace'=>'App\Http\Controllers\Api\V1',
    'middleware'=>'auth:sanctum'
]
, function(){

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);

    //insert bulk
    Route::post('invoices/bulk','InvoiceController@bulkStore');
});
