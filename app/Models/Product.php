<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'cost', 'price', 'quantity', 'visible', 'slug'];

    public function categories()
    {
        return $this->belongsToMany(App\Models\Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(App\Models\Order::class, 'order_item', 'product_id', 'order_id');
    }

    public function images()
    {
        return $this->morphMany(App\Models\Image::class, 'model');
    }
}
