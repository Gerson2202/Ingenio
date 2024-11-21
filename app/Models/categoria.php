<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Relación uno a muchos con Modelos
    public function modelos()
    {
        return $this->hasMany(Modelo::class);
    }
}
