<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'parent_id'];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(App\Models\Product::class, 'product_categories', 'category_id', 'product_id');
    }
}
