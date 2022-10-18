<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosPersonale;
use App\Models\Direccion;
use App\Models\Ubicacion;
use App\Models\Pais;
use App\Models\Ciudad;
use FilippoToso\PositionStack\Facade\PositionStack;

use Auth;


class AsociadosController extends Controller
{
    //
    public function index(){
        return view('asociados');
    }


    public function asociados_data()
    {
        if(Auth::user()->hasRole(['administrador'])){
            $asociados = DatosPersonale::all();
            return datatables($asociados)->toJson();    
        }
        else{
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }
    }


    public function paisesconsultarajax(){
        $paises = Pais::select('iso','nombreMin')->orderBy('nombreMin')->get();
        $datosPersonales = DatosPersonale::where('id','=',request('asociadoId'))->get();
        foreach ($datosPersonales as $datoPersonal) {
            $selectedPais = $datoPersonal->pais_iso;
            $selectedUbicacion = $datoPersonal->ubicacions_id;
            $selectedDireccion = $datoPersonal->direccion_id;
        }
        $ubicacionIni = Ubicacion::where('id','=',$selectedUbicacion)->get();
        foreach ($ubicacionIni as $ubi) {
            $ubiIni = $ubi->pais_iso;
        }
        $ciudadesWPaisSelected = Ciudad::where('pais_iso','=',$selectedPais)->orderBy('nombreCiudad')->get();
        
        $direccionIni = Direccion::where('id','=',$selectedDireccion)->get();
        foreach ($direccionIni as $dir) {
            $resid = $dir->residencia;
            $call = $dir->calle;
            $numviv = $dir->num_vivienda;
        }

        return response()->json(['paises' => $paises, 'datosPersonales' => $datosPersonales, 'ciudadesIni' => $ciudadesWPaisSelected, 'paisIni' => $ubiIni, 'residencia' => $resid, 'calle' => $call, 'vivienda' => $numviv]);
    }

    public function ciudadesconsultarajax(){
        $ciudades = Ciudad::select('id','nombreCiudad')->where('pais_iso','=',request('paisIso'))->orderBy('nombreCiudad')->get();
        return response()->json(['ciudades' => $ciudades]);
    }

    public function datosResidenciaUpdate(Request $request){
        if(Auth::user()->hasRole(['administrador']))
        {
            //try {
                $Pais = request('Pais');
                $Ciudad = request('Ciudad');
                $Residencia = request('Residencia');
                $Calle = request('Calle');
                $NumVivienda = request('NumVivienda');
                $IdAsociado = request('IdAsociado');

                $datos = DatosPersonale::where('id','=',$IdAsociado)->get();
                foreach ($datos as $data) {
                    $ubicacionAsociado = $data->ubicacions_id;
                    $direccionId = $data->direccion_id;
                }
                $paisDatosPersonales = DatosPersonale::findOrFail($IdAsociado);
                $paisDatosPersonales->pais_iso = $Pais;
                $paisDatosPersonales->save();

                $Ubicacion = Ubicacion::findOrFail($ubicacionAsociado);
                $Ubicacion->pais_iso = $Pais;
                $Ubicacion->ciudad_id = $Ciudad;
                $CiudadQuery = Ciudad::where('id','=',$Ciudad)->get();
                foreach ($CiudadQuery as $ciudadu) {
                    $ciudadName = $ciudadu->nombreCiudad;
                }
                $dataLatLon = PositionStack::forward($ciudadName,['country'=>$Pais, 'limit'=>1]);
                $Ubicacion->latitud = $dataLatLon["data"][0]["latitude"];
                $Ubicacion->longitud = $dataLatLon["data"][0]["longitude"];
                $Ubicacion->save();

                $Direccion = Direccion::findOrFail($direccionId);
                $Direccion->residencia = $Residencia;
                $Direccion->calle = $Calle;
                $Direccion->num_vivienda = $NumVivienda;
                $Direccion->save();

                return response()->json(['estado' => 'actualizado']);

            // } catch (\Exception $e) {
            //     //report($e); //report error
            //     return response()->json(['estado' => 'error']);
            // }
        }
        else {
            Auth::logout();
            //$request->session()->invalidate();
            return redirect('/login')->withErrors('Usted a intentado acceder a una pagina a la que no tiene permiso, se a cerrado su sesion');
        }

    }
}
