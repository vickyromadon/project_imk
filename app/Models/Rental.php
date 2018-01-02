<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'produk_id',
        'start_rent',
        'end_rent',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk');
    }
}
