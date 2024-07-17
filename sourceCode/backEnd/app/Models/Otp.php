<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Otp extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp',
        'status',
        'purpose',
    ];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class); }
}
