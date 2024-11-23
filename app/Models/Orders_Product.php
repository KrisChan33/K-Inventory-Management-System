<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'status',
        'quantity',
        'total',
    ];


    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
