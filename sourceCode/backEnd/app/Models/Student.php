<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'group_id',
        'first_name',
        'last_name',
        'birth_information',
        'address',
        'related',
    ];

    public function class(): BelongsTo
    { return $this->belongsTo(Group::class); }
}
