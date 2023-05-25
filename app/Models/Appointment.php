<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'start',
        'end',
        'description',
        'title',
        'doctor',
        'status',
        'created_at',
        'updated_at',
        'email_verified_at',
    ];
}
