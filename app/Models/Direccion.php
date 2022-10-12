<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DatosPersonale;
class Direccion extends Model
{
    use HasFactory;

    public function datosPersonales(){
        return $this->hasMany(DatosPersonale::class);
    }
}
