<?php

namespace App\Http\Controllers;

use App\Products;
use App\User;
use App\user_types;
use App\Users;
use App\UserTypes;
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
        $userTypes = user_types::all();
        return view('providers')->with('fournisseurs', $fournisseurs)->with('userTypes', $userTypes);
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
        $addProvider->userType_id = $add->providerType;
        $addProvider->location_id = 1;
        $addProvider->save();
        return redirect('providers');
    }

    public function updateProviders(Request $update)
    {
        $updateProviders = Users::find($update->update);
        $userTypes = user_types::all();
        return view('update')->with('data', $updateProviders)->with('userTypes', $userTypes);
    }

    public function updateDataProviders(Request $updateData)
    {
        $updateDataProviders = Users::find($updateData->btnUpdate);
        $updateDataProviders->lastName = $updateData->updateLastname;
        $updateDataProviders->firstName = $updateData->updateFirstname;
        $updateDataProviders->companyName = $updateData->updateCompany;
        $updateDataProviders->phone = $updateData->updatePhone;
        $updateDataProviders->address = $updateData->updateAddress;
        $updateDataProviders->userType = $updateData->updateProviderType;
        $updateDataProviders->location_id = 1;
        $updateDataProviders->save();
        return redirect('providers');
    }
}