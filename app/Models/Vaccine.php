<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaccine extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = [
    //     'vaccine_name',
    //     'description',
    //     'duration_in_months',
    // ];

    // public function patients(): HasMany
    // {
    //     return $this->hasMany(Patient::class);
    // }

    protected $fillable = [
        'link_id',
        'room_name',
        'postal_code',
        'address',
    ];

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
}
