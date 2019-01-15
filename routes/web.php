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

Route::get('/api/v1/lastupdate', function (Request $request) {
    return json_encode(DB::table('products')
        ->latest('updated_at')
        ->select('updated_at')
        ->first()
    );
});

Route::get('/api/v1/vegetables', function (Request $request) {
    $products = DB::table('products')
        ->join('units', 'units.id', '=', 'products.unit_id')
        ->select('products.id as id', 'productName', 'price', 'unitName as unit', 'stock', 'stock as low_stock_threshold', 'picture as image64', 'products.updated_at')
        ->get();

    for ($i = 0; $i < count($products); $i++)
        $products[$i]->suppliers = DB::table('product_supplier')
            ->join('users', 'users.id', '=', 'supplier_id')
            ->select('users.id as id', 'firstName', 'lastName', 'companyName')
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
    foreach ($request->changes as $change)
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
        ->select('products.id as id', 'productName', 'price', 'unitName as unit', 'stock', 'picture as image64', 'products.updated_at')
        ->where('products.updated_at', '>=', $datetime)
        ->get());
});

Route::post('/api/v1/withdraw', function (Request $request) {
    \App\provisionning_orders::destroy($request->orderid);
    return json_encode('ok');

});

Route::post('/api/v1/order', function (Request $request) {
    $order = new \App\provisionning_orders();
    $order->placed_by = $request->placedby;
    $order->product_id = $request->productid;
    $order->user_id = $request->providerid;
    $order->quantity = $request->quantity;
    error_log("order: ".$request->placedby.", ".$request->productid.", ".$request->providerid.", ".$request->quantity);

    try {
        $order->save();
        return json_encode('ok');
    } catch (Exception $e) {
        error_log("Exception:".$e->getMessage());
        abort(477, $e->getMessage());
    }

});

Route::get('/api/v1/orders', function (Request $request) {
    return json_encode(DB::table('provisionning_orders')
        ->join('products', 'products.id', '=', 'provisionning_orders.product_id')
        ->join('users', 'users.id', '=', 'provisionning_orders.user_id')
        ->select('provisionning_orders.id','productName', 'quantity', 'users.companyName', 'placed_by')
        ->get());
});


Route::view('/', 'welcome');
Route::view('/docApi', 'docApi');
Route::view('/admin', 'admin');
Route::get('/products', 'AdminController@indexProducts');
Route::get('/providers', 'AdminController@indexProviders');
Route::post('/products/del', 'AdminController@delProducts');
Route::post('/providers/del', 'AdminController@delProviders');
Route::post('/products/add', 'AdminController@addProducts');
Route::post('/providers/add', 'AdminController@addProviders');
Route::post('/products/updateProduct', 'AdminController@updateProducts');
Route::post('/providers/updateProvider', 'AdminController@updateProviders');
Route::post('/providers/updateDataProvider', 'AdminController@updateDataProviders');
Route::post('/products/updateDataProducts', 'AdminController@updateDataProducts');

