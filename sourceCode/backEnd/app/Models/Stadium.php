<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stadium extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'id',
        'club_id',
        'name',
        'sport_type',
        'play_mode',
        'pictures',
        'opening_hours',
    ];
}
