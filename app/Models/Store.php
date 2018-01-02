<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    // public $table = "stores";

	public $fillable = [
		'store_name', 
		'slogan',
		'deskripsi',
		'picture',
		'user_id',
	];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function produk()
    {
        return $this->hasMany('App\Models\Produk');
    }
}
