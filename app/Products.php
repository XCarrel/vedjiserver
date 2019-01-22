<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'productName', 'stock', 'price', 'picture', 'unit_id'];

    public function units()
    {
        return $this->belongsTo('App\units', 'unit_id');
    }
}
