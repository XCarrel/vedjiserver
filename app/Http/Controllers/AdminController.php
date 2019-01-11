<?php

namespace App\Http\Controllers;

use App\Products;
use App\User;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function indexProducts()
    {
        $products = Products::all();
        return view('products')->with('products', $products);
    }

    public function delProducts(Request $delete)
    {
        $delProducts = Products::find($delete->del);
        $delProducts->delete();
        return redirect('products');
    }

    public function indexProviders()
    {
        $fournisseurs = Users::all();
        return view('providers')->with('fournisseurs', $fournisseurs);
    }

    public function delProviders(Request $delete)
    {
        $delProviders = Users::find($delete->del);
        $delProviders->delete();
        return redirect('providers');
    }

    public function addProviders(Request $add)
    {
        $addProvider = new Users();
        $addProvider->lastName = $add->lastname;
        $addProvider->firstName = $add->firstname;
        $addProvider->companyName = $add->company;
        $addProvider->phone = $add->phone;
        $addProvider->address = $add->address;
        $addProvider->userType = $add->providerType;
        $addProvider->location_id = 1;
        $addProvider->save();
        return redirect('providers');
    }
}