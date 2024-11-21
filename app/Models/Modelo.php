<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'url', 'categoria_id','descripcion',
    ];
    // Relación inversa: un Modelo pertenece a una Categoria
    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }

    // RELACION UNO A MUCHOS EQUIPOS
    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
