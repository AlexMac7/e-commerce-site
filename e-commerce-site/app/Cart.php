<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'session_id',
        'product_name',
        'product_id',
        'price',
        'qty',
    ];
}
