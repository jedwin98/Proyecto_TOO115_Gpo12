<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EspacioReservado;
class Ejecutivo extends Model
{
    use HasFactory;

    public function espacios(){
        return $this->hasMany(EspacioReservado::class);
    }
}
