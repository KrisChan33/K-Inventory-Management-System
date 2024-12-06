<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'total',
        'status',
        'message_for_seller',
    ];  
// protected $casts = [
//         'Orders_Product_id' => 'array',
//     ];

// public static function boot()
// {
//     parent::boot();

//     static::created(function ($order) {
//         $totalOrders = OrderItem::where('order_id', $order->id)->sum('total');

//         $order->total = $totalOrders;
//         $order->save();


//     });
// }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }
}