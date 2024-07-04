<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pack extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'added_by',
        'name',
        'overview',
        'benefits',
        'price',
    ];

    public function manager() :BelongsTo
    { return $this->belongsTo(Manager::class); }

}
