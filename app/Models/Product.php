<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Rate;
use App\Models\Order;

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
}
