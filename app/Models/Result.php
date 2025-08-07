<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'banzuke_id',
        'is_irregular',
        'winner',
        'loser',
        'kimarite_id',
        'match_time',
        'year',
        'season',
        'day',
        'match_date',
    ];

    public function winnerProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function loserProfile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function kimarite(): BelongsTo
    {
        return $this->belongsTo(Kimarite::class);
    }

    public function banzuke(): BelongsTo
    {
        return $this->belongsTo(Banzuke::class);
    }
}
