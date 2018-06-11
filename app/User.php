<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * this is a tricky way to manage website
    * customer role is 0
    * manager is higher than 0
    * if it is higher than, it means than user has permission
    * @param int $r
    */

    public function hasPermission($r){
        return $this -> role > $r;
    }
}
