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

 // The 'creating' event is fired before the record is inserted into the database
 static::creating(function ($orderItem) {
    // Calculate the total for the order item
    $product = Product::find($orderItem->product_id);
  
        // Check stock quantity
        if ($product->stock_quantity < $orderItem->quantity) {
            $orderItem->status = 'Cancelled';
            Session::flash('error', 'Insufficient stock for product: ' . $product->name);
    }

});

    // The 'created' event is fired after the record has been inserted into the database
    static::created(function ($orderItem) {
        // Decrement the stock quantity of the product
        $product = Product::find($orderItem->product_id);
        if ($product) {
            $product->stock_quantity -= $orderItem->quantity;
            $product->save();
        }
        
    });

    static::updating(function ($orderItem){

        $product = Product::find($orderItem->product_id);

        if ($product->stock_quantity < $orderItem->quantity) {
            $orderItem->status = 'Cancelled';
            $orderItem->save();
        }
        else {
            $orderItem->status = 'Processing';
            $orderItem->save();
        }

        if ($orderItem->status == 'Cancelled') {
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