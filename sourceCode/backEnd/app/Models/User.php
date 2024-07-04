<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements MustVerifyEmail, JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
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


    public function admin(): HasOne
    { return $this->hasOne(Admin::class); }

    public function manager(): HasOne
    { return $this->hasOne(Manager::class); }

    public function coach(): HasOne
    { return $this->hasOne(Coach::class); }

    public function owner(): HasOne
    { return $this->hasOne(Owner::class); }

    public function employee(): HasOne
    { return $this->hasOne(Employee::class); }

    public function client(): HasOne
    { return $this->hasOne(Client::class); }

    public function notifications(): HasMany
    { return $this->hasMany(Notification::class); }

    public function otps(): HasMany
    { return $this->hasMany(Notification::class); }

    public function getJWTIdentifier()
    { return $this->getKey(); }

    public function getJWTCustomClaims()
    { return []; }

}
