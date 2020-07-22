<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Rate;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'price',
        'size',
        'description',
        'category_id',
        'slug',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function getStarRating()
    {
        $count = $this->reviews()->count();
        if (empty($count)){
            return 0;
        }
        $starCountSum = $this->reviews()->sum('rating');
        $average = $this->reviews()->avg('rating');

        return $average;
    }
}
