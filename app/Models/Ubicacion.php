<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pais;
use App\Models\Ciudad;
class Ubicacion extends Model
{
    use HasFactory;

    public function pais(){
        return $this->belongsTo(Pais::class);
    }
    public function ciudad(){
        return $this->belongsTo(Ciudad::class);
    }
}
