<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'category_id',
        'supplier_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }



    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}