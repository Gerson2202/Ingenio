<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    protected $fillable = [
        'nombre', 'correo', 'telefono'
    ];

    public function equipo()
    {
        return $this->belongsTo(equipo::class);
    }
}
