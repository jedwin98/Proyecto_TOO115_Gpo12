<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CuentaAportacione;
use App\Models\Asociado;
use App\Models\FormaPago;
use Auth;

class CuentaAportacioneController extends Controller
{
    //
    public function cuenta_aportacione_data(){
        if(Auth::user()->hasRole(['asociado'])){
            $cuenta_aportacioneQuery = CuentaAportacione::where('asociado_id','=',Auth::user()->id)->get();
            foreach ($cuenta_aportacioneQuery as $item) {
                $cuenta_aportacione = $item;
            }
            $forma_pagoQuery = FormaPago::where('id','=',$cuenta_aportacione->forma_pago_id)->get();
            foreach ($forma_pagoQuery as $item2) {
                $forma_pago = $item2;
            }
            return view('cuentas.datos_aportacione', compact('cuenta_aportacione'), compact('forma_pago'));
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }
}
