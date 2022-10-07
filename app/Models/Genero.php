<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DatosPersonale;

class Genero extends Model
{
    use HasFactory;

    public function datosPersonales(){
        return $this->hasMany(DatosPersonale::class, 'pais_iso', 'iso');
    }
}
