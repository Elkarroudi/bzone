<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stadium extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'club_id',
        'name',
        'sport_type',
        'play_mode',
        'pictures',
        'opening_hours',
    ];

    public function reservations() :HasMany
    { return $this->hasMany(Reservation::class); }

    public function ticket() :HasOne
    { return $this->hasOne(Ticket::class); }

    public function club() :BelongsTo
    { return $this->belongsTo(Club::class); }
}
