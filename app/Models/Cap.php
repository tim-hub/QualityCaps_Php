<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Cap extends Model
{
    use Searchable;
    protected $table = 'caps';
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name', 'description', 'price', 'image', 'category_id', 'supplier_id'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    // /**
    //  * Get the index name for the model.
    //  *
    //  * @return string
    //  */
    // public function searchableAs()
    // {
    //     return 'name_index';
    // }
    // /**
    //  * Get the indexable data array for the model.
    //  *
    //  * @return array
    //  */
    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();

    //     // Customize array...

    //     return $array;
    // }
}
