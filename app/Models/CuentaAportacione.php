<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asociado;
class CuentaAportacione extends Model
{
    use HasFactory;



    public function asociado(){
        return $this->belongsTo(Asociado::class);
    }
    public function tipoPago(){
        return $this->belongsTo(FormaPago::class);
    }

}
