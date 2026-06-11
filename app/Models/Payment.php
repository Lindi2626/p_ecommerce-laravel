<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 'transaction_id', 'payment_type',
        'status', 'amount', 'payload'
    ];

    protected $casts = [
        'payload' => 'array', // otomatis decode JSON
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}