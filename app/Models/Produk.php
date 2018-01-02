<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
	// public $table = "produks";

    public $fillable = [
		'produk_name', 
		'price',
		'quantity',
		'picture',
		'store_id',
		'tag_id',
		'deskripsi',
	];

 	public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    public function tag()
    {
        return $this->belongsTo('App\Models\Tag');
    }

    public function rental()
    {
        return $this->hasOne('App\Models\Rental');
    }
}
