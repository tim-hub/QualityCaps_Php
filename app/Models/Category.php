<?php

namespace App\Models;

class Category extends Model
{
    protected $table = 'categories';
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name', 'description'
    ];

    public function caps() {
        return $this->hasMany('Cap');
    }
}
