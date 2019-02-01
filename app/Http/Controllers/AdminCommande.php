<?php

namespace App\Http\Controllers;

use App\OrderItems;
use App\Products;
use App\Users;
use Illuminate\Http\Request;

class AdminCommande extends Controller
{
    // Show all the products in the view products
    public function index()
    {
        $products = Products::all();
        $users = Users::all();
        $commandes = OrderItems::all();

        dd($commandes);
        return view('commande')->with('commandes', $commandes);
    }
}
