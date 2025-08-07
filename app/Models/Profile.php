<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'link_id',
        'last_name',
        'first_name',
        'last_name_kana',
        'first_name_kana',
        'real_name',
        'birthday',
        'country',
        'place_of_birth',
        'is_retired',
        'image_url',
    ];

    public function variableProfileLatest(): HasOne
    {
        return $this->hasOne(VariableProfile::class)
            ->ofMany('information_date', 'max');
    }

    public function variableProfiles(): HasMany
    {
        return $this->hasMany(VariableProfile::class);
    }

    public function winners(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    public function losers(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
