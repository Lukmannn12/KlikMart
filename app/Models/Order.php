<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class);
    }

    public function statusColor()
{
    return match($this->status) {
        'pending' => 'bg-yellow-500',
        'paid' => 'bg-blue-500',
        'shipped' => 'bg-teal-500',
        'completed' => 'bg-green-500',
        'cancelled' => 'bg-red-500',
        default => 'bg-gray-500',
    };
}
}
