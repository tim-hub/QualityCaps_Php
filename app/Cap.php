<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
