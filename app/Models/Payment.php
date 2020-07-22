<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'order_id', 
        'card_number',
        'holder_name',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
