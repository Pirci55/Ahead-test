<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cage;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animals';

    protected $fillable = [
        'species',
        'name',
        'description',
        'age',
    ];

    /**
     * Клетка животного
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCageAttribute() {
        return $this->belongsTo(
            Cage::class,
            'cage_id'
        )->first();
    }
}
