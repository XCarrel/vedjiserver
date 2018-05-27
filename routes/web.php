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

Route::post('/api/v1/newstock', function (Request $request) {
    $id = $request->input('id');
    $newstock = $request->input('newstock');
    $ts = $request->input('ts');
    $prod = App\Products::find($id);
    if ($prod->updated_at == $ts)
    {
        $prod->stock = $newstock;
        $prod->save();
        $prod = App\Products::find($id); // read record back to get the update timestamp
        return json_encode($prod->updated_at->format("Y-m-d H:i:s"));
    }
    else
        return json_encode(["Error number" => 901, "Error message" => "Record was modified by someone else (".$prod->updated_at." vs $ts"]);
});

Route::get('/api/v1/vegetables/{datetime}', function (Request $request, $datetime) {
    if (!preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/", $datetime))
        return json_encode(["Error number" => 900, "Error message" => "Invalid date format"]);
    return json_encode(DB::table('products')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->select('productName','unit_id','unitName', 'stock','price')
        ->where ('products.updated_at', '>=', $datetime)
        ->get());
});

Route::get('/', function () {
    return view('welcome');
});
