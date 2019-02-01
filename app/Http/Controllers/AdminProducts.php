<?php

namespace App\Http\Controllers;

use App\product_supplier;
use App\Products;
use App\units;
use App\Users;
use Illuminate\Http\Request;

class AdminProducts extends Controller
{
    // Show all the products in the view products
    public function index()
    {
        $products = Products::all();
        return view('products')->with('products', $products);
    }

    public function showAdd()
    {
        $units = units::all();
        return view('showAddProduct')->with('units', $units);
    }

    // Add a product in the DB
    // TODO: make a better regex with numbers
    public function add(Request $addRequest)
    {
        $validatedData = $addRequest->validate([
            'product' => 'required|min:4|regex:/^[a-zA-Z]*$/',
            'stock' => 'required|regex:/[0-9]+(\.[0-9][0-9]?)?/',
            'price' => 'required|regex:/[0-9]+(\.[0-9][0-9]?)?/',
            'picture' => 'required',
        ]);

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
    public function getProducts($id)
    {
        $getProduct = Products::find($id);
        $units = units::all();
        $users = Users::all();
        foreach($users as $user)
        {
            // Check if a provider provides the product 
            $providers = product_supplier::where('supplier_id', '=', $user->id)->where('product_id', '=', $id)->get();
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
        return view('updateProduct')->with('data', $getProduct)->with('units', $units)->with('users', $users);
    }

    // Update a product in the DB
    // TODO: make a better regex with numbers
    public function update(Request $updateRequest)
    {
        $validatedData = $updateRequest->validate([
            'updateName' => 'required|min:4|regex:/^[a-zA-Z]*$/',
            'updateStok' => 'required|regex:/[0-9]+(\.[0-9][0-9]?)?/',
            'updatePrice' => 'required|regex:/[0-9]+(\.[0-9][0-9]?)?/'
        ]);
        
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