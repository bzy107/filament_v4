<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kimarite extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'name_kana',
        'kimarite_type_id',
    ];

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function kimariteType(): BelongsTo
    {
        return $this->belongsTo(KimariteType::class);
    }
}
