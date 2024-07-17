<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Club extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'owner_id',
        'added_by',
        'name',
        'slug',
        'description',
        'logo',
        'cover',
    ];

    public function owner(): BelongsTo
    { return $this->belongsTO(Owner::class); }

    public function manager(): BelongsTo
    { return $this->belongsTO(Manager::class); }

    public function employees(): HasMany
    { return $this->hasMany(Employee::class); }

    public function stadiums(): HasMany
    { return $this->hasMany(Stadium::class); }

    public function academy(): HasOne
    { return $this->hasOne(Academy::class); }
}
