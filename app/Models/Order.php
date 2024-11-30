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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            // $order->order_number = 'ORD-' . strtoupper(uniqid());
        });

        static::created(function ($order) {
            // Calculate the total amount for the order
            // $order->total = $order->orderItems->sum(fn ($item) => $item->total);

            // add the quantity of the product to the orderitems
            // $order->quantity = $order->orderItems->sum(fn ($item) => $item->quantity);
            
            
            //Decrement stock quantity
    //          foreach ($order->orderItems as $orderItem)
    //         {
    //             $product = $orderItem->product;
    //             $product->quantity -= $orderItem->quantity;
    //             $product->save();
    //         }

    //         $order->save();
        });
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