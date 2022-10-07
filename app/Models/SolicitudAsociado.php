<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ubicacion;
use App\Models\DatosPersonale;
use App\Models\EspacioReservado;
use App\Models\User;
use App\Models\Biometrica;

class SolicitudAsociado extends Model
{
    use HasFactory;

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
    public function datosPersonales(){
        return $this->belongsTo(DatosPersonale::class);
    }
    public function espacioReservado(){
        return $this->belongsTo(EspacioReservado::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function biometrica(){
        return $this->belongsTo(Biometrica::class);
    }
}
