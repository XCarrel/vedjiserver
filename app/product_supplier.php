<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_supplier extends Model
{
    protected $table = "product_supplier";
    protected $fillable = ['product_id', 'supplier_id'];
}
