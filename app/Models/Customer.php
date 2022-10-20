<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    use HasFactory;
    protected $fillable = [
        'full_name',
        'identity_number ',
        'description',
        'address',
        'phone_number',
        'email',
        'password',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
