<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DatosPersonale;
use App\Models\Asociacion;
use App\Models\Referencia;
use App\Models\Beneficiario;
use App\Models\CuentaAportacione;
use App\Models\Empresario;
use App\Models\Recibo;
use App\Models\CuentaAhorro;

class Asociado extends Model
{
    use HasFactory;


    public function datosPersonales(){
        return $this->belongsTo(DatosPersonale::class);
    }
    public function asociaciones(){
        return $this->hasMany(Asociacion::class);
    }
    public function referencias(){
        return $this->hasMany(Referencia::class);
    }
    public function beneficiarios(){
        return $this->hasMany(Beneficiario::class);
    }
    public function cuentaAportaciones(){
        return $this->hasOne(CuentaAportacione::class);
    }

    public function empresario(){
        return $this-> hasOne(Empresario::class);
    }

    public function recibos(){
        return $this-> hasMany(Recibo::class);
    }
    public function cuentaAhorro(){
        return $this-> hasOne(CuentaAhorro::class);
    }


}
