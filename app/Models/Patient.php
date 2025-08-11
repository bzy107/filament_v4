<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $fillable = [
    //     'registered_at',
    //     'patient_name',
    //     'type',
    //     'owner_id',
    //     'breed_id',
    //     'vaccine_id',
    // ];

    // protected $casts = [
    //     'registered_at' => 'date',
    // ];

    // public function owner(): BelongsTo
    // {
    //     return $this->belongsTo(Owner::class);
    // }

    // public function treatments(): HasMany
    // {
    //     return $this->hasMany(Treatment::class);
    // }

    // public function breed(): BelongsTo
    // {
    //     return $this->belongsTo(Breed::class);
    // }

    // public function vaccine(): BelongsTo
    // {
    //     return $this->belongsTo(Vaccine::class);
    // }


    protected $fillable = [
        'owner_id',
        'breed_id',
        'vaccine_id',
        'name_history',
        'height',
        'weight',
        'information_date',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function vaccine(): BelongsTo
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }
}
