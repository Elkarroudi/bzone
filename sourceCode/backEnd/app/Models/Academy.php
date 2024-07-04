<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Academy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'club_id',
    ];

    public function club() :BelongsTo
    { return $this->belongsTo(Club::class); }

    public function groups() :HasMany
    { return $this->hasMany(Group::class); }
}
