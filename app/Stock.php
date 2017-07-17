<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'barcode',
        'item_desc',
        'supplier_code',
        'price'
    ];
}
