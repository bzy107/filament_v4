<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rank extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'status_id',
        'banzuke_id',
        'rank_name',
        'direction',
    ];

    public function variableProfiles(): HasMany
    {
        return $this->hasMany(VariableProfile::class);
    }

    public function banzuke(): BelongsTo
    {
        return $this->belongsTo(Banzuke::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
