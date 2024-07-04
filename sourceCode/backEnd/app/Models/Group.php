<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'academy_id',
        'trainer_id',
        'name',
    ];

    public function academy(): BelongsTo
    { return $this->belongsTo(Academy::class); }

    public function coach(): BelongsTo
    { return $this->belongsTo(Coach::class); }

    public function students(): HasMany
    { return $this->hasMany(Student::class); }
}
