<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStorage extends Model
{
    use HasFactory;
    protected $table = 'product_storage';
    protected $fillable = [
        'bill_id',
        'import_price',
        'quantity',
        'product_id',
        'storage_id'
    ];

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
