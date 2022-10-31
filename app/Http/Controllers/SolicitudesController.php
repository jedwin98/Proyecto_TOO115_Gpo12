<?php

namespace App\Http\Controllers;

use App\Models\Acta;
use Illuminate\Http\Request;
use App\Models\SolicitudAsociado;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SolicitudesController extends Controller
{
    public function index(){
        $solicitudes=SolicitudAsociado::where("estado_solicitud","=","Pendiente")->get();
        return view('solicitudes.index', compact('solicitudes'));
    }
    public function show(SolicitudAsociado $solicitud){
        $user_log=Auth::id();
        return view('solicitudes.show', compact('solicitud','user_log'));
    }
    public function showUser(){
        $user_log=Auth::id();
        $soli=SolicitudAsociado::where("user_id","=",request('idUsuario'))->get();
        if (!$soli->isEmpty()) { 
            foreach ($soli as $item) {
                $solicitud = $item;//se retornara siempre la ultima solicitud del aspirante, en dado caso hubiera realizado varias solicitudes
            }
            return view('solicitudes.show', compact('solicitud','user_log'));
        }
        else{
            return view('solicitudes.show', compact('user_log'));
        }
    }
    public function edit(SolicitudAsociado $solicitud){

        return view('solicitudes.edit', compact('solicitud'));
    }
    public function update(SolicitudAsociado $solicitud, Request $request){
        $acta=new Acta();
        $folderPath = 'img/';      
        $image = explode(";base64,", $request->signed);
        $image_type = explode("image/", $image[0]);
        $image_type_png = $image_type[1];
        $image_base64 = base64_decode($image[1]);
        $file = $folderPath . uniqid() . '.'.$image_type_png;
        
        file_put_contents($file, $image_base64);


        // guardando firma
        $acta->firma_presidente= $file;


        $folderPath = 'img/';      
        $image = explode(";base64,", $request->signed2);
        $image_type = explode("image/", $image[0]);
        $image_type_png = $image_type[1];
        $image_base64 = base64_decode($image[1]);
        $file = $folderPath . uniqid() . '.'.$image_type_png;
        
        file_put_contents($file, $image_base64);


        // guardando firma
        $acta->firma_secretario= $file;
        $acta->numero_acta=$solicitud->id;// se me olvidó ponerle su fk xdd 
        $acta->save();

        $solicitud->estado_solicitud="Aprobada";
        $solicitud->save();
        $user_id = $solicitud->user_id;
        User::find($user_id)->assignRole("asociado");
        return redirect()->route('solicitudes.index');
    }
    public function store(Request $request){
        
        $solicitud=SolicitudAsociado::where("id","=", $request->soli )->get();
        $soli=$solicitud->first();
        $soli->estado_solicitud="Rechazada";
        $soli->save();
        $user_id = $soli->user_id;
        User::find($user_id)->removeRole("asociado");
       
        return redirect()->route('solicitudes.index');
    }


}
