<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pack extends BaseModel
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
