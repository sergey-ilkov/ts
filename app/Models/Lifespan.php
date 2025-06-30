<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Translatable\HasTranslations;

class Lifespan extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['desc'];

    protected $fillable = [
        'ttl',
        'desc',
    ];


    protected $casts = [
        'ttl' => 'integer',
        'desc' => 'string',
    ];

    // ? many to many
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}