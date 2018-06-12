<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    protected $table = 'order_items';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cap_id', 'order_id', 'quantity'
    ];


    public function order() {
        return $this->belongsTo('App\Models\Order');
    }
    public function cap() {
        return $this->belongsTo('App\Models\Cap');
    }

    public function getSubTotalAttribute(){
        return $this->cap->price * $this->quantity;
        // return 10;
    }


}
