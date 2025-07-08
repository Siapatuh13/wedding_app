<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'attendance',
        'guest_count',
        'guest_names',
        'events',
        'message'
    ];

    protected $casts = [
        'events' => 'array'
    ];
}