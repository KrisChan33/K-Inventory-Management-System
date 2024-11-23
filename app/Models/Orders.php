<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsToMany(Products::class, 'order_product')
                    ->withPivot('quantity', 'total', 'status')
                    ->withTimestamps();
    }

    public function OrderItems()
    {
        return $this->hasMany(Orders_Product::class);
    }
}