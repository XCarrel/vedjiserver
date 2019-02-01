<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminCommande extends Controller
{
    // Show all the products in the view products
    public function index()
    {
        // Select all the orders in the DB
        $commandes = DB::select('SELECT orderItems.id, firstName, lastName, productName, quantity FROM orderItems 
                                        INNER JOIN products on product_id = products.id
                                        INNER JOIN users on user_id = users.id;');

        foreach($commandes as $commande)
        {
            //Generate a timestamp using mt_rand.
            $timestamp = mt_rand(1, time());
            //Format that timestamp into a readable date string.
            $randomDate = date("d M Y", $timestamp);

            $commande->date = $randomDate;
        }

        return view('commande')->with('commandes', $commandes);
    }
}
