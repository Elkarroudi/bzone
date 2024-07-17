<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reservation_id',
        'code',
        'verify_link',
    ];

    public function reservation() :BelongsTo
    { return $this->belongsTo(Reservation::class); }
}
