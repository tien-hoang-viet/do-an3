<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'value',
        'unit',
        'quantity',
        'start_date',
        'end_date',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
