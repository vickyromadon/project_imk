<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $fillable = [
		'tag_name',
	];

	public function produk()
    {
        return $this->hasOne('App\Models\Produk');
    }
}
