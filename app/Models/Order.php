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
        'user_id', 'status', 'quantity', 'receiver_name', 'address'
    ];

    public function user() {
        return $this->belongsTo('User');
    }
    public function order_items() {
        return $this->hasMany('Order_Item');
    }

    public function grand_total(){

        $order_items = order_items();
        $sum =0;

        foreach($order_items as $item){
            $sum += $item->sub_total;
        }
        return $sum;

    }
    public function grand_total_with_gst(){
        return grand_total() * $this ->gst;
    }
}
