<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaAhorro;

class CuentaAhorroController extends Controller
{
    //
    public function cuenta_ahorro_data(Request $request){
        $asociado_id = request('asociado_id');
        if(Auth::user()->hasRole(['administrador'])){
            $cuenta_ahorro = CuentaAhorro::select('fecha_ultimo_corte','fecha_este_corte','saldo_anterior','saldo_actual','interes')->where('asociado_id','=',$asociado_id)->get();
            return response()->json(['CuentaAhorro' => $cuenta_ahorro]);
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }
}
