<?php

namespace App\Models;

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
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'picture',
        'address',
        'city',
        'province',
        'zipcode',
        'number_phone',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAdmin(){
        if( $this->role == 0 )
            return true;
        return false;
    }

    public function isSeller(){
        if( $this->role == 1 )
            return true;
        return false;
    }

    public function store()
    {
        return $this->hasOne('App\Models\Store');
    }

    public function rental()
    {
        return $this->hasOne('App\Models\Rental');
    }  
}
