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

    public function del(Request $delete)
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
}