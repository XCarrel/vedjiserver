<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_supplier extends Model
{
    protected $fillable = ['product_id', 'supplier_id'];
}
