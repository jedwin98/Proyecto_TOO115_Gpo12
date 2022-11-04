<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaAportacione;
use App\Models\Asociado;

class CuentaAportacioneController extends Controller
{
    //
    public function cuenta_aportacione_data(Asociado $asociado){
        if(Auth::user()->hasRole(['administrador'])){
            $cuenta_aportacione = CuentaAportacione::where('asociado_id','=',$asociado->id)->get();
            return view('cuentas.datos_aportacione', (compact($cuenta_aportacione)));
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }
}
