<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CuentaAportacione;
class FormaPago extends Model
{
    use HasFactory;

    public function aportaciones(){
        return $this->hasOne(CuentaAportacione::class);
    }
}
