<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;


class Cap extends Model
{

    protected $table = 'caps';
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name', 'description', 'price', 'image', 'category_id', 'supplier_id',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    // public function order__items(){
    //     return $this->hasMany('App\Models\Order_Item');
    // }
}
