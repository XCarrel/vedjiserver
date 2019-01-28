<?php

namespace App\Http\Controllers;

use App\user_types;
use App\Users;
use App\UserTypes;
use Illuminate\Http\Request;

class AdminProviders extends Controller
{
    // Show all the providers in the view providers
    public function index()
    {
        $fournisseurs = Users::all();
        $userTypes = user_types::all();
        return view('providers')->with('fournisseurs', $fournisseurs)->with('userTypes', $userTypes);
    }

    // Add a provider in the DB
    public function add(Request $addAction)
    {
        $add = new Users();
        $add->lastName = $addAction->lastname;
        $add->firstName = $addAction->firstname;
        $add->companyName = $addAction->company;
        $add->phone = $addAction->phone;
        $add->address = $addAction->address;
        $add->userType_id = $addAction->providerType;
        $add->location_id = 1;
        $add->save();
        return redirect('providers');
    }

    // Delete a provider in the DB
    public function delete(Request $deleteAction)
    {
        $delete = Users::find($deleteAction->del);
        $delete->delete();
        return redirect('providers');
    }

    // Get the informations for the provider
    public function getProviders(Request $getAction)
    {
        $getProvider = Users::find($getAction->update);
        $userTypes = user_types::all();
        return view('updateProvider')->with('data', $getProvider)->with('userTypes', $userTypes);
    }

    // Update a provider in the DB
    public function update(Request $updateAction)
    {
        $update = Users::find($updateAction->btnUpdate);
        $update->lastName = $updateAction->updateLastname;
        $update->firstName = $updateAction->updateFirstname;
        $update->companyName = $updateAction->updateCompany;
        $update->phone = $updateAction->updatePhone;
        $update->address = $updateAction->updateAddress;
        $update->userType_id = $updateAction->updateProviderType;
        $update->location_id = 1;
        $update->save();
        return redirect('providers');
    }
}