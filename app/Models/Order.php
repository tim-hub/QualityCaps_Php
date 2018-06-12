<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    /**
     * The attributes that are mass assignable.
     *  status 0 ,1 ,2 waiting shipping and done
     * @var array
     */
    protected $fillable = [
        'user_id', 'status', 'receiver_name', 'address'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function order_items() {
        return $this->hasMany('App\Models\Order_Item');
    }

    public function grand_total(){

        $order_items = $this->order_items();
        $sum =0;

        foreach($order_items as $item){
            $sum += $item->sub_total();
        }
        return $sum;
    }
    public function grand_total_with_gst(){
        return $this->grand_total() * (1+$this ->gst);
    }
}
