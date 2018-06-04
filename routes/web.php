<?php

use Illuminate\Http\Request;

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

header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Headers: Content-type');
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
//header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
//header('Content-type: application/xml');

Route::get('/api/v1/lastupdate', function (Request $request) {
    return json_encode(DB::table('products')
        ->select('updated_at')
        ->latest()->first());
});

Route::get('/api/v1/vegetables', function (Request $request) {
    $products = DB::table('products')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->select('products.id as id', 'productName', 'price', 'unitName as unit', 'stock', 'picture as image64', 'products.updated_at')
        ->get();

    for ($i = 0; $i < count($products); $i++)
        $products[$i]->suppliers = DB::table('product_supplier')
            ->join('users', 'users.id', '=', 'supplier_id')
            ->select('firstName', 'lastName', 'companyName')
            ->where('product_id', '=', $products[$i]->id)
            ->get();

    return json_encode($products);
});

Route::get('/api/v1/vegetables/nopics', function (Request $request) {
    return json_encode(DB::table('products')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->select('productName', 'unit_id', 'unitName', 'stock', 'price')
        ->get());
});

Route::patch('/api/v1/newstock', function (Request $request) {
    $changes = $request->input('changes');
    error_log(print_r($changes, 1));
    foreach ($changes as $change)
    {
        $prod = App\Products::find($change['id']);
        $prod->stock = $change['stock'];
        $prod->save();
    }
    return json_encode("ok");
});

Route::get('/api/v1/vegetables/{datetime}', function (Request $request, $datetime) {
    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $datetime))
        return json_encode(["Error number" => 900, "Error message" => "Invalid date format"]);
    return json_encode(DB::table('products')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->select('productName', 'unit_id', 'unitName', 'stock', 'price')
        ->where('products.updated_at', '>=', $datetime)
        ->get());
});

Route::get('/', function () {
    return view('welcome');
});
