<?php

namespace App\Models;

use App\Models\Lifespan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'is_active',
        'price',
        'currency',
        'trial_period',
        'trial_interval',
        'paid_period',
        'paid_interval',
        'sort_order',
    ];


    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'is_active' => 'boolean',
        'price' => 'decimal',
        'currency' => 'string',
        'trial_period' => 'integer',
        'trial_interval' => 'string',
        'paid_period' => 'integer',
        'paid_interval' => 'string',
        'sort_order' => 'integer',
    ];


    // ? one to many (Inverse) / Belongs To
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // ? one to many
    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class)->chaperone();
    }
}