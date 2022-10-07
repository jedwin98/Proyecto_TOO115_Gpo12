<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asociado;

class Referencia extends Model
{
    use HasFactory;

    public function asociado(){
        return $this->belongsTo(Asociado::class);
    }
}
