<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
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
        return $this->belongsToMany(Orders::class, 'order_product')
        ->withTimestamps();
    }

    public function OrderItems()
    {
        return $this->hasMany(Orders_Product::class);
    }
}