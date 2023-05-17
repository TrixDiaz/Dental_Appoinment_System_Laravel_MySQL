<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time_start',
        'time_end',
        'description',
        'name',
        'status',
        'title',
        'created_at',
        'updated_at',
    ];
}
