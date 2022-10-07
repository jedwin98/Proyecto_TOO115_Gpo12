<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SolicitudAsociado;
class Biometrica extends Model
{
    use HasFactory;

    public function solicitudAsociados(){
        return $this->hasMany(SolicitudAsociado::class);
    }
}
