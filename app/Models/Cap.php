<?php

namespace App\Models;

class Cap extends Model
{
    protected $table = 'caps';
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name', 'description', 'price', 'image', 'category_id', 'supplier_id'
    ];

    public function category(){

        return $this->belongsTo('Category');
    }

    public function supplier(){
        return $this->belongsTo('Supplier');
    }
}
