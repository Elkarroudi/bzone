<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mockery\Matcher\Not;

class Manager extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'added_by',
        'role',
    ];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class, 'user_id'); }

    public function packs() :HasMany
    { return $this->hasMany(Pack::class); }

    public function notes() :HasMany
    { return $this->hasMany(Note::class); }

    public function clubs() :HasMany
    { return $this->hasMany(Club::class); }
}
