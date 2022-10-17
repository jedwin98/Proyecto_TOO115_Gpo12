<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DatosPersonale;
class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'residencia',
        'calle',
        'num_vivienda',
    ];

    public function datosPersonales(){
        return $this->hasMany(DatosPersonale::class);
    }
}
