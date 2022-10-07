<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;
use App\Models\Ubicacion;
class Pais extends Model
{
    use HasFactory;


    public function ciudades(){
        return $this->hasMany(Ciudad::class);
    }
    public function ubicacion(){
        return $this->hasOne(Ubicacion::class);
    }
    
}
