<?php

namespace App\Http\Controllers;

use App\product_supplier;
use App\Products;
use App\units;
use App\Users;
use Illuminate\Http\Request;

class AdminProducts extends Controller
{
    // Show the products in the view products
    public function index()
    {
        $products = Products::all();
        $units = units::all();
        return view('products')->with('products', $products)->with('units', $units);
    }

    // Add a product in the DB
    public function add(Request $addRequest)
    {
        $add = new Products();
        $add->productName = $addRequest->product;
        $add->stock = $addRequest->stock;
        $add->price = $addRequest->price;
        $add->unit_id = $addRequest->selectUnit;

        // Encode the picture in base64 
        $filename = $_FILES['picture']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $base64 = base64_encode(file_get_contents($addRequest->picture));
        $add->picture = "data:image/".$ext.";base64,".$base64;
        $add->save();
        return redirect('products');
    }

    // Delete a product in the DB
    public function delete(Request $deleteRequest)
    {
        $delete = Products::find($deleteRequest->del);
        $delete->delete();
        return redirect('products');
    }

    // Get the informations for the product 
    public function getProducts(Request $getInfo)
    {
        $getProduct = Products::find($getInfo->update);
        $units = units::all();
        $users = Users::all();
        $array = array();
        foreach($users as $user)
        {
            // Check if a provider provides the product 
            $providers = product_supplier::where('supplier_id', '=', $user->id)->where('product_id', '=', $getInfo->update)->get();
            foreach($providers as $provider)
            {
                if($user->id == $provider->supplier_id)
                {   
                    $user->provides = true;
                }
                else
                {
                    $user->provides = false;
                }
            }
        }
        return view('updateProduct')->with('data', $getProduct)->with('units', $units)->with('users', $users)->with('array', $array);
    }

    // Update a product in the DB
    public function update(Request $updateRequest)
    {
        $update = Products::find($updateRequest->btnUpdate);
        $update->productName = $updateRequest->updateName;
        $update->stock = $updateRequest->updateStok;
        $update->price = $updateRequest->updatePrice;
        $update->unit_id = $updateRequest->updateUnit;

        // Check if he has to update the picture in the DB
        if($updateRequest->has('updatePicture'))
        {
            $filename = $_FILES['updatePicture']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $base64 = base64_encode(file_get_contents($updateRequest->updatePicture));
            $update->picture = "data:image/".$ext.";base64,".$base64;
        }
        $update->save();

        // TODO: implement a cleaner method
        if($updateRequest->has('selectProviders'))
        {
            product_supplier::where('product_id', '=', $updateRequest->btnUpdate)->delete();

            foreach($updateRequest->selectProviders as $selectedP)
            {
                $selectProviders = new product_supplier();
                $selectProviders->product_id = $updateRequest->btnUpdate;
                $selectProviders->supplier_id = $selectedP;
                $selectProviders->save();
            }
        }
        return redirect('products');
    }
}