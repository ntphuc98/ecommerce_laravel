<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $fillable = ['cost', 'price', 'quantity', 'product_id', 'order_id'];

    public function order(){
        return $this->belongsTo(App\Models\Order::class, 'order_id');
    }

    public function product(){
        return $this->belongsTo(App\Models\Product::class, 'order_id');
    }
}
