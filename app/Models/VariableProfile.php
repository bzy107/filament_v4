<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariableProfile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'profile_id',
        'rank_id',
        'affiliation_room_id',
        'name_history',
        'height',
        'weight',
        'information_date',
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function affiliationRoom(): BelongsTo
    {
        return $this->belongsTo(AffiliationRoom::class);
    }

    public function rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class);
    }
}
