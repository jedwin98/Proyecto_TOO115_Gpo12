<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;
use App\Models\Ubicacion;
use App\Models\DatosPersonale;
class Pais extends Model
{
    use HasFactory;


    public function ciudades(){
        return $this->hasMany(Ciudad::class, 'pais_iso', 'iso');
    }
    public function ubicacion(){
        return $this->hasOne(Ubicacion::class, 'pais_iso', 'iso');
    }
    public function datosPersonales(){
        return $this->hasMany(DatosPersonale::class, 'pais_iso', 'iso');
    }
    
}
