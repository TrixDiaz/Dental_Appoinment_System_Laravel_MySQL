<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time_start',
        'time_end',
        'reason',
        'status',
        'name',
        'created_at',
        'updated_at',
    ];
}
