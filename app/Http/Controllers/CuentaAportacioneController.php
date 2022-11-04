<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaAportacione;

class CuentaAportacioneController extends Controller
{
    //
    public function cuenta_aportacione_data(Request $request){
        $asociado_id = request('asociado_id');
        if(Auth::user()->hasRole(['administrador'])){
            $cuenta_aportacione = CuentaAportacione::select('cuota','primera_cuota')->with('forma_pago')->where('asociado_id','=',$asociado_id)->get();
            return response()->json(['CuentaAportacione' => $cuenta_aportacione]);
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }
}
