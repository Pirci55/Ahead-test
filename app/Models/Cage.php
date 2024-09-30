<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models;

class Cage extends Model
{
    use HasFactory;

    protected $table = 'cages';

    protected $fillable = [
        'name',
        'capacity',
    ];

    /**
     * Животные в клетке
     * 
     * @return static
     */
    public function getAnimalsAttribute() {
        return Models\Animal::all()->where('cage_id', $this->id);
    }
}
