<?php

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

Route::get('/index', function () {
    return view('index');
});
Route::get('/login',function(){
    return view('login');
});
Route::get('/pizza-baker',function(){
    return view('pizza-baker');
});

Route::get('/supplier',function(){
    return view('supplier');
});

Route::get('/customer',function(){
    return view('customer');
});
// Route::get('/menu',function(){
//     return view('menu');
// });
Route::get('/pizzas',function(){
    return view('pizzas');
});
Route::get('/order',function(){
    return view('order');
});
 Route::get('/menu', 'App\Http\Controllers\ManageingredientsController@get_menu');

 // Manage Supplier
 Route::get('/add-supplier','App\Http\Controllers\ManagesupplierController@viewsupplier');
 Route::post('/add', 'App\Http\Controllers\ManagesupplierController@addsupplier');
 Route::get('/edit-supplier', 'App\Http\Controllers\ManagesupplierController@editsupplier');
 Route::get('/delete', 'App\Http\Controllers\ManagesupplierController@deletesupplier');
 Route::get('/hide', 'App\Http\Controllers\ManagesupplierController@hidesupplier');

 // Manage Ingredients
//  Route::get('/ingredient',function(){
//     return view('ingredient');
// });

// Manage Ingredients
Route::post('/add-ingredient', 'App\Http\Controllers\ManageingredientsController@add_ingredients');
Route::get('/ingredient','App\Http\Controllers\ManageingredientsController@get_ingredients');
Route::get('/supply','App\Http\Controllers\ManageingredientsController@get_supplier');
Route::get('/edit-ingredients/{id}','App\Http\Controllers\ManageingredientsController@edit_ingredients');
Route::post('/update-ingredients', 'App\Http\Controllers\ManageingredientsController@update_ingredients');
Route::get('/delete-ingredients/{id}', 'App\Http\Controllers\ManageingredientsController@delete_ingredients');
Route::get('/hide-ingredient/{id}', 'App\Http\Controllers\ManageingredientsController@hide_ingredient');
Route::get('/show-ingredient/{id}', 'App\Http\Controllers\ManageingredientsController@show_ingredient');
// Route::get('/edit-ingredients',function(){
//     return view('edit-ingredients');
// });
// Route::get('/edit-ingredient','App\Http\Controllers\ManageingredientsController@get_supplier');

// Manage Customer//
Route::post('/order', 'App\Http\Controllers\ManagecustomerController@customer_order');