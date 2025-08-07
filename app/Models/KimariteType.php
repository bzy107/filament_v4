<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KimariteType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
    ];

    public function kimarites(): HasMany
    {
        return $this->hasMany(Kimarite::class);
    }
}
