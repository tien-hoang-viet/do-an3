<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_price',
        'type',
        'date',
        'customer_id',
        'promotion_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function paymentProducts()
    {
        return $this->hasMany(PaymentProduct::class);
    }
}
