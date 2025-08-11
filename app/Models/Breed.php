<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Breed extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = [
    //     'breed_name',
    //     'species',
    // ];

    // public function patients(): HasMany
    // {
    //     return $this->hasMany(Patient::class);
    // }

    protected $fillable = [
        // 'status_id',
        // 'banzuke_id',
        'rank_name',
        'direction',
    ];

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
}
