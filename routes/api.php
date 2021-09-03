<?php

use App\Http\Controllers\CustomerController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Save Customer
Route::post('save_customer', [CustomerController::class, 'saveCustomer']);

//Get Customers
Route::get('get_customers', [CustomerController::class, 'getCustomers']);

//Get Customer Detail
Route::get('get_customer/{id}', [CustomerController::class, 'getCustomerDetail']);

//Update Customer
Route::post('update_customer/{id}', [CustomerController::class, 'updateCustomer']);

//Delete Customer
Route::delete('delete_customer/{id}', [CustomerController::class, 'deleteCustomer']);
