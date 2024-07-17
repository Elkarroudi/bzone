<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'added_by',
        'club_id',
    ];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class, 'user_id'); }

    public function club(): BelongsTo
    { return $this->belongsTo(Club::class, 'club_id'); }
}
