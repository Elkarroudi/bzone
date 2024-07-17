<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coach extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'club_id',
    ];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class, 'user_id'); }

    public function groups(): HasMany
    { return $this->hasMany(Group::class); }
}
