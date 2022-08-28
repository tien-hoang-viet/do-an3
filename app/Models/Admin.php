<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'full_name',
        'identity_number',
        'email',
        'phone_number',
        'address',
        'is_master',
        'password',
        'role_id',
        'ádasdsad',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
