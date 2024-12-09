<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'total',
        'status',
    ];

public static function boot()
{
    parent::boot();

    // static::creating(function ($orderItem) {
    //     $product = Product::find($orderItem->product_id);
    //     if ($product) {
    //         $orderItem->total = $product->price * $orderItem->quantity;
    //     }
    // });
    
    // The 'created' event is fired after the record has been inserted into the database
    static::created(function ($orderItem) {
        $order = Order::find($orderItem->order_id);

        $product = Product::find($orderItem->product_id);
        if ($product) {
            //Update and Reduce stock quantity
            $product->stock_quantity -= $orderItem->quantity;
            $product->save();

            //Update order total
            $order->total += $orderItem->total;
            $order->save();
        } else {
            $orderItem->status = 'Cancelled';
            $orderItem->save();
        }
        

    });


    // static::updating(function ($orderItem) {
    //     $product = Product::find($orderItem->product_id);
    //     $order = Order::find($orderItem->order_id);
        
    //        if ($product > 0)
    //         {
    //             $orderItem->total = $product->price * $orderItem->quantity;
    //             $orderItem->status = 'Pending';
    //             $product->stock_quantity -= $orderItem->quantity; // Reduce stock quantity
    //             $order->total += $orderItem->total; // Update order total

    //             $product->save();
    //             $order->save();
    //         } else {
    //             $orderItem->status = 'Cancelled';
    //             $orderItem->save();
    //         }
    // });

    static::updated(function ($orderItem){
        $product = Product::find($orderItem->product_id);
        $order = Order::find($orderItem->order_id);
        
            if ($product->stock_quantity < $orderItem->quantity) {
                $orderItem->status = 'Cancelled';
                $product->stock_quantity += $orderItem->quantity; // Revert stock quantity
                $order->total -= $orderItem->total; // Revert order total
                $orderItem->save();
                $product->save();
            } else {
                $orderItem->status = 'Pending';
            }

    });

        static::deleted(function ($orderItem) {
            $order = Order::find($orderItem->order_id);
             $product = Product::find($orderItem->product_id);

            if ($order) {
                $order->total = $order->orderItems->sum('total');
                $order->save();
            }

            $product = Product::find($orderItem->product_id);
            if ($product) {
                $product->stock_quantity += $orderItem->quantity;
                $product->save();
            }

    });
    
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}