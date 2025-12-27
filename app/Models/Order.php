<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'user_id',
        'email',
        'customer_name',
        'total_amount',
        'payment_intent_id',
        'payment_method',
        'tx_hash',
        'sender_address',
        'payment_status',
        'status',
        'payment_confirmed_at',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'payment_confirmed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->order_number = 'ORD-' . strtoupper(uniqid());
        });
    }
}
