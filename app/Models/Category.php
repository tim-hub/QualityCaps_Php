<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('App\Models\Cap');
    }
}
