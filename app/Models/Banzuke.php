<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banzuke extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'banzuke',
    ];

    public function ranks(): HasMany
    {
        return $this->hasMany(Rank::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
