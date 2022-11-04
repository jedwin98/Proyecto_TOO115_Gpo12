<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaAhorro;
use App\Models\Asociado;

class CuentaAhorroController extends Controller
{
    //
    public function cuenta_ahorro_data(Asociado $asociado){
        if(Auth::user()->hasRole(['administrador'])){
            $cuenta_ahorro = CuentaAhorro::where('asociado_id','=',$asociado->id)->get();
            return view('cuentas.datos_ahorro', (compact($cuenta_ahorro)));
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }
}
