<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
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
