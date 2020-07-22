<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderDetails';
    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'total_price',
    ];

    public function order()
    {
        return $this->belongTo(OrderDetail::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id');
    }
}
