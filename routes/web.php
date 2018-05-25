<?php

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

Route::get('/api/v1/lastupdate', function (Request $request) {
    return json_encode("lastupdate");
});

Route::get('/api/v1/vegetables', function (Request $request) {
    return json_encode(DB::table('products')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->get());
});

Route::get('/api/v1/vegetables/nopics', function (Request $request) {
    return json_encode(DB::table('products')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->select('productName','unit_id','unitName', 'stock','price')
        ->get());
});

Route::post('/api/v1/vegetable/{id}', function (Request $request, $id) {
    return json_encode("vegetable $id updated");
});

Route::get('/api/v1/vegetables/{datetime}', function (Request $request, $datetime) {
    if (!preg_match("/^[0-9]{14}$/", $datetime))
        return json_encode(["Error number" => 900, "Error message" => "Invalid date format"]);
    // build database format of the date
    $datetime = substr($datetime,0,4)."-".substr($datetime,4,2)."-".substr($datetime,6,2)." ".substr($datetime,8,2).":".substr($datetime,10,2).":".substr($datetime,12,2);
    error_log($datetime);
    return json_encode(DB::table('products')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->select('productName','unit_id','unitName', 'stock','price')
        ->where ('products.updated_at', '>=', $datetime)
        ->get());
});

Route::get('/', function () {
    return view('welcome');
});
