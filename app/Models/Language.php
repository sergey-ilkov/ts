<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $fillable = [
        'name',
        'code',

    ];

    protected $casts = [
        'name' => 'string',
        'code' => 'string',

    ];
}
