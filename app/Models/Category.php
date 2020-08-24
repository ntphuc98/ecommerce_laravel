<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
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

    // scope
    public function scopeRoot($query)
    {
        return $query->where('parent_id', '=', 0);
    }
}
