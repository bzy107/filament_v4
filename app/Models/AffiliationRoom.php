<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AffiliationRoom extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'link_id',
        'room_name',
        'postal_code',
        'address',
    ];

    public function variableProfiles(): HasMany
    {
        return $this->hasMany(VariableProfile::class);
    }
}
