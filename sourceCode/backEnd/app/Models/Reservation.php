<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'stadium_id',
        'client_id',
        'status',
    ];

    public function client(): BelongsTo
    { return $this->belongsTo(Client::class); }

    public function stadium(): BelongsTo
    { return $this->belongsTo(Stadium::class); }
}
