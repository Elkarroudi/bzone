<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'contact_id',
        'added_by',
        'note',
    ];

    public function manager() :BelongsTo
    { return $this->belongsTo(Manager::class); }

    public function contact() :BelongsTo
    { return $this->belongsTo(Contact::class); }
}
