<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'identity_number ',
        'address ',
        'phone_number',
        'email ',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
