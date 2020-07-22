<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeAddImage($query, $product_id, $image)
    {
        return $query->create([
            'product_id' => $product_id,
            'image' => $image,
        ]);
    }
}
