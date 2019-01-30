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
        return view('providers')->with('fournisseurs', $fournisseurs);
    }

    public function showAdd()
    {
        $userTypes = user_types::all();
        return view('showAddProvider')->with('userTypes', $userTypes);
    }

    // Add a provider in the DB
    public function add(Request $addRequest)
    {
        $validatedData = $addRequest->validate([
            'lastname' => 'required|min:4|regex:/^[a-zA-Z]*$/',
            'firstname' => 'required|min:4|regex:/^[a-zA-Z]*$/',
            'company' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/^[0-9]*$/'
        ]);

        $add = new Users();
        $add->lastName = $addRequest->lastname;
        $add->firstName = $addRequest->firstname;
        $add->companyName = $addRequest->company;
        $add->phone = $addRequest->phone;
        $add->address = $addRequest->address;
        $add->userType_id = $addRequest->providerType;
        $add->location_id = 1;
        $add->save();
        return redirect('providers');
    }

    // Delete a provider in the DB
    public function delete(Request $deleteRequest)
    {
        $delete = Users::find($deleteRequest->del);
        $delete->delete();
        return redirect('providers');
    }

    // Get the informations for the provider
    public function getProviders($id)
    {
        $getProvider = Users::find($id);
        $userTypes = user_types::all();
        return view('updateProvider')->with('data', $getProvider)->with('userTypes', $userTypes);
    }

    // Update a provider in the DB
    public function update(Request $updateRequest)
    {
        $validatedData = $updateRequest->validate([
            'updateLastname' => 'required|min:4|regex:/^[a-zA-Z]*$/',
            'updateFirstname' => 'required|min:4|regex:/^[a-zA-Z]*$/',
            'updateCompany' => 'required',
            'updateAddress' => 'required',
            'updatePhone' => 'required|regex:/^[0-9]*$/'
        ]);

        $update = Users::find($updateRequest->btnUpdate);
        $update->lastName = $updateRequest->updateLastname;
        $update->firstName = $updateRequest->updateFirstname;
        $update->companyName = $updateRequest->updateCompany;
        $update->phone = $updateRequest->updatePhone;
        $update->address = $updateRequest->updateAddress;
        $update->userType_id = $updateRequest->updateProviderType;
        $update->location_id = 1;
        $update->save();
        return redirect('providers');
    }
}