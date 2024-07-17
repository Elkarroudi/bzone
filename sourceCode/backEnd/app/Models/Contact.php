<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'club_name',
        'email',
        'phone',
        'address',
        'subject',
        'message',
    ];

    public function notes(): HasMany
    { return $this->hasMany(Note::class); }
}
