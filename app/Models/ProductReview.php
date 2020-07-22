<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = [
        'comment',
        'product_id',
        'rating',
        'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class,'id', 'user_id');
    }
}
