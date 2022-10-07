<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pais;
use App\Models\Ubicacion;
class Ciudad extends Model
{
    use HasFactory;

    public function pais(){
        return $this->belongsTo(Pais::class);
    }
    public function ubicacion(){
        return $this->hasOne(Ubicacion::class);
    }
}
