<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    //

    protected $fillable = [
        'name',
        'slug',
        'symbol',
        'passphrase',
        'notification',
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'symbol' => 'integer',
        'passphrase' => 'boolean',
        'notification' => 'boolean',
    ];

    // ? many to many
    public function lifespans(): BelongsToMany
    {
        return $this->belongsToMany(Lifespan::class);
    }

    // ? one to many
    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }
}