<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cap_id', 'order_id', 'quantity', 'grand_total'
    ];

    public function user() {
        return $this->belongsTo('User');
    }
    public function order_items() {
        return $this->hasMany('Order_Item');
    }
}
