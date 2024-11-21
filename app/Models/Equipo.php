<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelo_id','proveedor_id','mac', 'estado', 
    ];

    // RELACION DE MUCHOS A UNO CON MODELOS
    public function modelos()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id');
    }

    // RELACION DE MUCHOS A UNO CON MODELOS
    public function proveedores()
    {
        return $this->belongsTo(proveedor::class, 'proveedor_id');
    }
}
