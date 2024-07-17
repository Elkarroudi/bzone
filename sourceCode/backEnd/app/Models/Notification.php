<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'content',
        'read_at',
    ];

    protected $casts = ['read_at' => 'datetime',];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class); }
}
