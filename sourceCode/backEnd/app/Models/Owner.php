<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'added_by',
    ];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class, 'user_id'); }

    public function club(): HasOne
    { return $this->hasOne(Club::class); }
}
