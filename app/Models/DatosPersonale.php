<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pais;
use App\Models\TipoDocumento;
use App\Models\Genero;
use App\Models\SolicitudAsociado;
use App\Models\Asociado;
use App\Models\Direccion;
class DatosPersonale extends Model
{
    use HasFactory;

    public function pais(){
        return $this->belongsTo(Pais::class);
    }
    public function tipoDocumento(){
        return $this->belongsTo(TipoDocumento::class);
    }
    public function genero(){
        return $this->belongsTo(Genero::class);
    }
    public function direccion(){
        return $this->belongsTo(Direccion::class);
    }
    public function solicitudAsociados(){
        return $this->hasMany(SolicitudAsociado::class);
    }
    public function asociado(){
        return $this->hasOne(Asociado::class);
    }
}
