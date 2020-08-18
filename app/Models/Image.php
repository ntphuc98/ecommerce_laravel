<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['name', 'model_type', 'model_id'];

    public function imageable()
    {
        return $this->morphTo();
    }
}
