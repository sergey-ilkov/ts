<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $fillable = [
        'message',
        'read',
        'ip',
        'email'
    ];


    protected $casts = [
        'message' => 'string',
        'read' => 'boolean',
        'ip' => 'string',
        'email' => 'string',
    ];
}