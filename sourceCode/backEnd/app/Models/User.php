<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'username',
        'email',
        'email_verified_at',
        'phone',
        'password',
        'address',
        'type',
    ];

    protected $hidden = ['password', 'email_verified_at', 'created_at', 'updated_at', 'deleted_at', ];
    protected $casts = ['email_verified_at' => 'datetime', 'password' => 'hashed',];

}
