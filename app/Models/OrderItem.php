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
        // 'address',
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
    static::updating(function ($orderItem) {
        $originalOrderItem = $orderItem->getOriginal();
        $product = Product::find($orderItem->product_id);
        $order = Order::find($orderItem->order_id);

        if ($product && $order) {
            // Revert the original stock quantity and order total
            if ($originalOrderItem['status'] != 'Cancelled') {
                $product->stock_quantity += $originalOrderItem['quantity'];
                $order->total -= $originalOrderItem['total'];
            }

            // Apply the new stock quantity and order total
            if ($orderItem->status == 'Cancelled') {
                // $orderItem->total = 0;
                // $orderItem->quantity = 0;
            } else {
                $orderItem->total = $product->price * $orderItem->quantity;
                $product->stock_quantity -= $orderItem->quantity;
                $order->total += $orderItem->total;
            }

            $product->save();
            $order->save();
        }
    });
    
   static::updated(function ($orderItem) {
            $product = Product::find($orderItem->product_id);
            $order = Order::find($orderItem->order_id);

            if ($product && $order) {
                if ($order->status == 'Cancelled') {
                    $orderItem->status = 'Cancelled';
                    $orderItem->save();
                }

                if ($orderItem->status == 'Cancelled') {
                    // Revert stock quantity and order total if the status is 'Cancelled'
                    // $product->stock_quantity += $orderItem->quantity;
                    // $order->total -= $orderItem->total;
                    $product->save();
                    $order->save();
                } elseif (in_array($orderItem->status, ['Pending', 'Processing', 'Completed'])) {
                    // Reduce stock quantity and update order total if the status is 'Pending', 'Processing', or 'Completed'
                    // $product->stock_quantity -= $orderItem->quantity;
                    // $order->total += $orderItem->total;
                    // $product->save();
                    // $order->save();
                } else {
                    if ($product->stock_quantity < $orderItem->quantity) {
                        $orderItem->status = 'Cancelled';
                        // $product->stock_quantity += $orderItem->quantity; // Revert stock quantity
                        // $order->total -= $orderItem->total; // Revert order total
                        $orderItem->save();
                        $product->save();
                        $order->save();
                    } else {
                        $orderItem->status = 'Pending';
                        $orderItem->total = $product->price * $orderItem->quantity;
                        $product->stock_quantity += $orderItem->quantity; // Add stock quantity
                        $order->total += $orderItem->total; // Update order total
                        $orderItem->save();
                        $product->save();
                        $order->save();
                    }
                }
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