<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    protected $fillable = [
        'bill_id',
        'quantity',
        'import_price',
        'total_price',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
