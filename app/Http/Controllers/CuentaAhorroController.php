<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaAhorro;
use App\Models\Asociado;
use Auth;

class CuentaAhorroController extends Controller
{
    //
    public function cuenta_ahorro_data(){
        if(Auth::user()->hasRole(['asociado'])){
            //dd(Auth::user()->id);
            $cuenta_ahorroQuery = CuentaAhorro::where('asociado_id','=',Auth::user()->id)->get();
            foreach ($cuenta_ahorroQuery as $item) {
                $cuenta_ahorro = $item;
            }
            //dd($cuenta_ahorro);
            return view('cuentas.datos_ahorro', compact('cuenta_ahorro'));
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }
}
