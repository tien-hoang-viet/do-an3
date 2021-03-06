<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'short_description',
        'description',
        'quantity',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function paymentProducts()
    {
        return $this->hasMany(PaymentProduct::class);
    }

    public function productStorages()
    {
        return $this->hasMany(ProductStorage::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
}
