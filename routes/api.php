<?php

use Illuminate\Http\Request;

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

Route::patch('/v1/newproductdatas', function (Request $request) {
    foreach ($request->changes as $change)
    {
        $prod = App\Products::find($change['id']);
        $prod->fill($change);
        $prod->save();
    }
    return response()->json(["message" => "Modifications correctement effectuées"], 200);
});
