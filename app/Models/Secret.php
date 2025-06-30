<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Secret extends Model
{
    //
    protected $fillable = [
        'text',
        'key',
        'hash',
        'passphrase',
        'email_notification',
        'ttl',
        'deleted_at',
    ];

    protected $hidden = [
        'hash',
        'passphrase',
    ];

    protected $casts = [
        'text' => 'string',
        'key' => 'string',
        'hash' => 'hashed',
        'passphrase' => 'hashed',
        'email_notification' => 'string',
        'ttl' => 'integer',
        'deleted_at' => 'timestamp',
    ];
}