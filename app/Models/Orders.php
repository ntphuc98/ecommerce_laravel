<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name', 'phone', 'address', 'email', 'note', 'total_cost', 'total_payment', 'status', 'user_id'];
    public function user(){
        return $this->belongsTo(App\User::class, 'user_id');
    }

    public function items(){
        return $this->hasMany(App\Models\OrderItem::class, 'order_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(App\Models\Product::class, 'order_item', 'order_id', 'product_id');
    }
}
