<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ejecutivo;
use App\Models\Sucursal;


class EspacioReservado extends Model
{
    use HasFactory;


    public function ejecutivo(){
        return $this->belongsTo(Ejecutivo::class);
    }
    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

}
