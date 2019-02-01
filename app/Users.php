<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'firstName', 'lastName', 'companyName', 'phone', 'address', 'userType'];

    public function products()
    {
        return $this->belongsToMany('App\Products', 'product_supplier', 'supplier_id', 'product_id');
    }

    public function commande()
    {
        return $this->belongsToMany('App\Products', 'orderItems', 'user_id', 'product_id');
    }
}
